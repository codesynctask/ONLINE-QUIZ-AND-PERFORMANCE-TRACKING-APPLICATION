<?php

class Admin extends Controller {
    public function __construct() {
        // AuthMiddleware::handle();
        // Authorization::handle();
    }

    // ROUTING
    public function index() {
        $this->view("admin/dashboard");
    }

    public function report() {
        $this->view("admin/quiz_report");
    }

    public function usermanagement() {
        $this->view("admin/user_management");

    }
    public function profile() {
        $this->view("admin/profile");

    }

    // API endpoints for AJAX calls
    public function api() {
        header('Content-Type: application/json');
        
        $request_method = $_SERVER['REQUEST_METHOD'];
        $url_parts = explode('/', trim($_GET['url'] ?? '', '/'));
        
        // $url_parts[0] = 'Admin'
        // $url_parts[1] = 'api'
        // $url_parts[2] = resource (students/faculty)
        // $url_parts[3] = id (optional)
        
        $resource = $url_parts[2] ?? null;
        $id = $url_parts[3] ?? null;
        
        $users_model = new Users();
        
        if ($resource === 'students') {
            if ($request_method === 'GET') {
                // Get all students
                $students = $users_model->all([], 0, 1000);
                $filtered = array_filter($students, function($user) {
                    return $user['role'] === 'Student';
                });
                // Decrypt passwords for display
                $filtered = array_map(function($student) {
                    $student['password'] = Crypt::decrypt($student['password']);
                    return $student;
                }, $filtered);
                echo json_encode(array_values($filtered));
            } elseif ($request_method === 'DELETE' && $id) {
                // Delete a student
                $user = $users_model->findOneBy('user_id', $id);
                if ($user && $user['role'] === 'Student') {
                    $users_model->deleteBy('user_id', $id);
                    $this->json_response(['success' => true, 'message' => 'Student deleted'], 200);
                } else {
                    $this->json_response(['success' => false, 'message' => 'Student not found'], 404);
                }
            }
        } elseif ($resource === 'faculty') {
            if ($request_method === 'GET') {
                // Get all faculty with their permissions (category)
                $database = new Database();
                $db = $database->getConnection();
                $sql = "SELECT u.*, fp.category 
                        FROM users u 
                        LEFT JOIN faculty_permissions fp ON u.user_id = fp.user_id 
                        WHERE u.role = 'Faculty'
                        LIMIT 1000";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $faculty = $stmt->fetchAll();
                
                // Decrypt passwords for display
                $faculty = array_map(function($fac) {
                    $fac['password'] = Crypt::decrypt($fac['password']);
                    return $fac;
                }, $faculty);
                echo json_encode(array_values($faculty));
            } elseif ($request_method === 'POST') {
                // Handle both JSON and form-encoded data
                $content_type = $_SERVER['CONTENT_TYPE'] ?? '';
                if (strpos($content_type, 'application/json') !== false) {
                    $data = json_decode(file_get_contents('php://input'), true);
                } else {
                    $data = $_POST;
                }
                
                if ($data && !empty($data['fullname']) && !empty($data['username']) && !empty($data['password']) && !empty($data['category'])) {
                    // Map category value (id or 'any') to human-readable name (copied from Students controller)
                    $categories = [
                        "any" => "Any Category",
                        "9" => "General Knowledge",
                        "10" => "Entertainment: Books",
                        "11" => "Entertainment: Film",
                        "12" => "Entertainment: Music",
                        "13" => "Entertainment: Musicals & Theatres",
                        "14" => "Entertainment: Television",
                        "15" => "Entertainment: Video Games",
                        "16" => "Entertainment: Board Games",
                        "17" => "Science & Nature",
                        "18" => "Science: Computers",
                        "19" => "Science: Mathematics",
                        "20" => "Mythology",
                        "21" => "Sports",
                        "22" => "Geography",
                        "23" => "History",
                        "24" => "Politics",
                        "25" => "Art",
                        "26" => "Celebrities",
                        "27" => "Animals",
                        "28" => "Vehicles",
                        "29" => "Entertainment: Comics",
                        "30" => "Science: Gadgets",
                        "31" => "Entertainment: Japanese Anime & Manga",
                        "32" => "Entertainment: Cartoon & Animations"
                    ];

                    $categoryKey = (string)($data['category'] ?? 'any');
                    $categoryName = $categories[$categoryKey] ?? $data['category'];

                    // remove category from user payload so users table isn't expected to have that column
                    unset($data['category']);
                    $data['role'] = 'Faculty';

                    // Encrypt password before storing - with error handling
                    try {
                        $data['password'] = Crypt::encrypt($data['password']);
                        if ($users_model->create($data)) {
                            $user_id = $users_model->lastInsertId();
                            
                            // store faculty permission as category NAME into faculty_permissions table
                            try {
                                $permModel = new FacultyPermissions();
                                $perm_created = $permModel->create([
                                    'user_id' => (int)$user_id,
                                    'category' => $categoryName
                                ]);
                                if (!$perm_created) {
                                    error_log("Warning: Failed to insert permission for faculty user_id={$user_id}, category={$categoryName}");
                                }
                            } catch (Exception $e) {
                                error_log("Permission insert error for faculty user_id={$user_id}: " . $e->getMessage());
                            }
                            $this->json_response(['success' => true, 'message' => 'Faculty created successfully'], 200);
                        } else {
                            $this->json_response(['success' => false, 'message' => 'Database error: Failed to create faculty'], 400);
                        }
                    } catch (Exception $e) {
                        $this->json_response(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 400);
                    }
                } else {
                    $this->json_response(['success' => false, 'message' => 'Missing required fields: fullname, username, password, category'], 400);
                }
            } elseif ($request_method === 'DELETE' && $id) {
                // Delete a faculty member
                $user = $users_model->findOneBy('user_id', $id);
                if ($user && $user['role'] === 'Faculty') {
                    $users_model->deleteBy('user_id', $id);
                    $this->json_response(['success' => true, 'message' => 'Faculty deleted'], 200);
                } else {
                    $this->json_response(['success' => false, 'message' => 'Faculty not found'], 404);
                }
            }
        } else {
            http_response_code(400);
            $this->json_response(['success' => false, 'message' => 'Invalid resource'], 400);
        }
        exit();
    }
}