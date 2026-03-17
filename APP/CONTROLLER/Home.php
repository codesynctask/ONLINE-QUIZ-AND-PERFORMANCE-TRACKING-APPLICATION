<?php

class Home extends Controller
{
    public function index()
    {
        $UserModel = new Users();


        $this->json_response($UserModel->all());
    }
}


