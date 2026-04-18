<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="shortcut icon" href="<?= ROOT ?>\PUBLIC\ASSETS\imgs\favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\main.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\style.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\animation.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\utility.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\component.css">
</head>

<body class="relative text-[clamp(0.8rem,1.3vw,1rem)]">
    <header class="fixed w-[100vw] z-[999]">
        <nav class=" backdrop-filter backdrop-blur-sm  flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"
                class="logo">
            <ul class="xcenter flex justify-between items-center gap-4 p-4 hidden md:flex">
                <li>
                    <a href="<?= ROOT ?>/public/Admin/"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span
                            class="hidden lg:block">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/Admin/report"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-a-b text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Quiz
                            Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/Admin/usermanagement"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">User
                            Management</span>
                    </a>
                </li>
            </ul>

            <div class="cta-buttons flex justify-between items-center gap-2 p-2 ">

                <!-- Logout -->
                <form id="logout-form" action="<?= ROOT ?>/public/auth/logout" method="post" class="hidden"></form>
                <button id="logout-btn" type="button"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-logout-box-line"></i> <span class="hidden lg:block">Logout</span>
                </button>

                <a href="<?= ROOT ?>\public\Admin\profile"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105 w-fit">
                    <i class="ri-user-fill"></i> <span class="hidden lg:block">Admin Profile</span>
                </a>

                <div class="responsive-nav-cont">
                    <i class="ri-menu-fill text-[1.7em] cursor-pointer hover:text-orange-600 md:hidden"></i>
                    <i class="ri-close-large-line text-[1.7em] cursor-pointer hover:text-orange-600 hidden"></i>
                </div>
            </div>
        </nav>

        <ul
            class="responsive-nav-cont backdrop-blur-md border-2 border-orange-600 w-fit p-8 flex gap-4 flex-col justify-start items-start fixed right-[5vw] rounded-lg hidden ">
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] "></i> Dashboard
                </a>
            </li>
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/report"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-a-b text-[1.6em] lg:text-[1em] "></i> Quiz Report
                </a>
            </li>
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/usermanagement"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em] "></i> User Management
                </a>
            </li>
        </ul>

    </header>

    <main class="pt-28 px-[5vw]">
        <section class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-4">User Management</h1>

            <!-- Badges to switch panels -->
            <div class="mb-6">
                <div class="inline-flex rounded-lg bg-gray-100 p-1 gap-3">
                    <button id="badge-students"
                        class="px-4 py-2 rounded-lg bg-white text-sm font-medium">Students</button>
                    <button id="badge-faculty" class="px-4 py-2 bg-white rounded-lg text-sm font-medium">Faculty</button>
                </div>
            </div>

            <!-- Students panel: view + delete via AJAX -->
            <div id="panel-students" class="bg-white shadow rounded p-4 mb-6">
                <h2 class="text-xl font-semibold mb-2">Students</h2>
                <div class="overflow-x-auto">
                    <table id="students-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium">#</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Full Name</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">username</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">password</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="students-tbody">
                            <!-- rows populated by AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Faculty panel: create, read, delete; assign category access -->
            <div id="panel-faculty" class="hidden bg-white shadow rounded p-4 mb-6">
                <h2 class="text-xl font-semibold mb-2 bg-white">Faculty</h2>

                <form id="faculty-create-form" class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" name="fullname" id="faculty-name" placeholder="Full name" required
                        class="border-2 border-orange-600 px-3 py-2 rounded" />
                    <input type="text" name="username" id="faculty-username" placeholder="Username" required
                        class="border-2 border-orange-600 px-3 py-2 rounded" />
                    <input type="text" name="password" id="faculty-password" placeholder="Password" required
                        class="border-2 border-orange-600 px-3 py-2 rounded" />
                    <select name="category" id="faculty-category" class="border-2 border-orange-600 px-8 py-4 active:border-orange-600  focus:border-orange-600 py-2 px-4 rounded-lg  w-full flex justify-center items-center">
                        <option value="any">Any Category</option>
                        <option value="9">General Knowledge</option>
                        <option value="10">Entertainment: Books</option>
                        <option value="11">Entertainment: Film</option>
                        <option value="12">Entertainment: Music</option>
                        <option value="13">Entertainment: Musicals &amp; Theatres</option>
                        <option value="14">Entertainment: Television</option>
                        <option value="15">Entertainment: Video Games</option>
                        <option value="16">Entertainment: Board Games</option>
                        <option value="17">Science &amp; Nature</option>
                        <option selected value="18">Science: Computers</option>
                        <option value="19">Science: Mathematics</option>
                        <option value="20">Mythology</option>
                        <option value="21">Sports</option>
                        <option value="22">Geography</option>
                        <option value="23">History</option>
                        <option value="24">Politics</option>
                        <option value="25">Art</option>
                        <option value="26">Celebrities</option>
                        <option value="27">Animals</option>
                        <option value="28">Vehicles</option>
                        <option value="29">Entertainment: Comics</option>
                        <option value="30">Science: Gadgets</option>
                        <option value="31">Entertainment: Japanese Anime &amp; Manga</option>
                        <option value="32">Entertainment: Cartoon &amp; Animations</option>
                    </select>
                    <div class="md:col-span-4 flex justify-center py-5">
                        <button type="submit" class="btn btn-primary w-fit">Create Faculty</button>
                    </div>
                </form>

                <div class="overflow-x-auto border-black">
                    <table id="faculty-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium">#</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Full Name</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Username</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Category Access</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="faculty-tbody">
                            <!-- rows populated by AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
    $(function () {

        // Responsive nav toggle 
        const $menuOpen  = $('.ri-menu-fill');
        const $menuClose = $('.ri-close-large-line');
        const $dropNav   = $('ul.responsive-nav-cont');

        $menuOpen.on('click', function () {
            $dropNav.removeClass('hidden');
            $menuOpen.addClass('hidden');
            $menuClose.removeClass('hidden');
        });

        $menuClose.on('click', function () {
            $dropNav.addClass('hidden');
            $menuOpen.removeClass('hidden');
            $menuClose.addClass('hidden');
        });

        $dropNav.find('a').on('click', function () {
            $dropNav.addClass('hidden');
            $menuOpen.removeClass('hidden');
            $menuClose.addClass('hidden');
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('header').length) {
                $dropNav.addClass('hidden');
                $menuOpen.removeClass('hidden');
                $menuClose.addClass('hidden');
            }
        });

        // Logout confirmation → POST form submit
        $('#logout-btn').on('click', function () {
            const confirmed = window.confirm('Are you sure you want to logout?');
            if (confirmed) {
                $('#logout-form').submit();
            }
        });




        // ============================= AJAX DATA
        const API_BASE = '<?= ROOT ?>/public/Admin/api';

        function renderStudentRow(i, s) {
            return `
                    <tr data-id="${s.id}">
                        <td class="px-4 py-2">${i}</td>
                        <td class="px-4 py-2">${s.name}</td>
                        <td class="px-4 py-2">${s.email}</td>
                        <td class="px-4 py-2">${s.registered}</td>
                        <td class="px-4 py-2">
                            <button class="btn btn-danger btn-sm delete-student" data-id="${s.id}">Delete</button>
                        </td>
                    </tr>
                `;
        }

        function renderFacultyRow(i, f) {
            return `
                    <tr data-id="${f.id}">
                        <td class="px-4 py-2">${i}</td>
                        <td class="px-4 py-2">${f.name}</td>
                        <td class="px-4 py-2">${f.email}</td>
                        <td class="px-4 py-2">${f.category_name || '—'}</td>
                        <td class="px-4 py-2">
                            <button class="btn btn-danger btn-sm delete-faculty" data-id="${f.id}">Delete</button>
                        </td>
                    </tr>
                `;
        }

        function loadStudents() {
            $('#students-tbody').html('<tr><td colspan="5" class="p-4">Loading...</td></tr>');
            $.get(API_BASE + '/students')
                .done(function (res) {
                    const list = Array.isArray(res) ? res : [];
                    if (!list.length) {
                        $('#students-tbody').html('<tr><td colspan="5" class="p-4">No students found</td></tr>');
                        return;
                    }
                    const html = list.map((s, idx) => renderStudentRow(idx + 1, s)).join('');
                    $('#students-tbody').html(html);
                })
                .fail(function () {
                    $('#students-tbody').html('<tr><td colspan="5" class="p-4 text-red-600">Failed to load students</td></tr>');
                });
        }

        function loadFaculty() {
            $('#faculty-tbody').html('<tr><td colspan="5" class="p-4">Loading...</td></tr>');
            $.get(API_BASE + '/faculty')
                .done(function (res) {
                    const list = Array.isArray(res) ? res : [];
                    if (!list.length) {
                        $('#faculty-tbody').html('<tr><td colspan="5" class="p-4">No faculty found</td></tr>');
                        return;
                    }
                    const html = list.map((f, idx) => renderFacultyRow(idx + 1, f)).join('');
                    $('#faculty-tbody').html(html);
                })
                .fail(function () {
                    $('#faculty-tbody').html('<tr><td colspan="5" class="p-4 text-red-600">Failed to load faculty</td></tr>');
                });
        }


        $(function () {
            // initial load
            loadStudents();
            loadFaculty();

            // badge switching
            $('#badge-students').on('click', function () {
                $('#panel-faculty').addClass('hidden');
                $('#panel-students').removeClass('hidden');
                $(this).addClass('bg-orange-600 text-white');
                $('#badge-faculty').removeClass('bg-orange-600 text-white');
            });
            $('#badge-faculty').on('click', function () {
                $('#panel-students').addClass('hidden');
                $('#panel-faculty').removeClass('hidden');
                $(this).addClass('bg-orange-600 text-white');
                $('#badge-students').removeClass('bg-orange-600 text-white');
            });

            // delegate deletes
            $(document).on('click', '.delete-student', function () {
                const id = $(this).data('id');
                if (!confirm('Delete this student?')) return;
                $.ajax({ url: API_BASE + '/students/' + id, method: 'DELETE' })
                    .done(function () { loadStudents(); })
                    .fail(function () { alert('Failed to delete student'); });
            });

            $(document).on('click', '.delete-faculty', function () {
                const id = $(this).data('id');
                if (!confirm('Delete this faculty user?')) return;
                $.ajax({ url: API_BASE + '/faculty/' + id, method: 'DELETE' })
                    .done(function () { loadFaculty(); })
                    .fail(function () { alert('Failed to delete faculty'); });
            });

            // create faculty
            $('#faculty-create-form').on('submit', function (e) {
                e.preventDefault();
                const payload = {
                    name: $('#faculty-name').val(),
                    email: $('#faculty-email').val(),
                    category_id: $('#faculty-category').val()
                };
                $.post(API_BASE + '/faculty', payload)
                    .done(function () { $('#faculty-name,#faculty-email').val(''); loadFaculty(); })
                    .fail(function () { alert('Failed to create faculty'); });
            });
        });



    });
    </script>
</body>

</html>