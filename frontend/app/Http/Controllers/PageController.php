<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public string $backend;

    public function __construct()
    {
        $this->backend = getenv('Webservice_HOST');
    }

    public function home()
    {
        $ch = curl_init("http://$this->backend/projects");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = json_decode(curl_exec($ch));

        // If not exist error from curl display the projects
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            // If not exist from server display the projects
            if ($info['http_code'] == 200) {
                return view('home', ["data" => $result]);
            } else {
                abort(500);
            }
        } else {
            abort(500);
        }
    }

    public function signProject()
    {
        if (session()->exists('user')) {
            return view('cadastra-projeto');
        } else {
            return redirect('/');
        }
    }

    public function login()
    {
        if (!session()->exists('user')) {
            return view('login');
        } else {
            return redirect('/');
        }
    }

    public function logoff()
    {
        if (session()->exists('user')) {
            session()->flush();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function verifyUser(Request $req)
    {
        $data = [
            "nameOurEmail" => $req->nameOurEmail,
            "password" => $req->password
        ];
        $headers = ["Content-type:application/json"];

        $ch = curl_init("http://$this->backend/user/logIn");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            if ($info['http_code'] == 200) {
                if ($result != null) {
                    session(["user" => $result]);
                    return redirect('/');
                } else {
                    return redirect('/login');
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function storageUser(Request $req)
    {
        $data = [
            "name" => $req->name,
            "password" => $req->password,
            "email" => $req->email
        ];
        $headers = ["Content-type:application/json"];

        $ch = curl_init("http://$this->backend/user");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            if ($info['http_code'] == 200) {
                if ($result != null) {
                    session(["user" => $result]);
                    return redirect('/');
                } else {
                    return redirect('/login');
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function storageProject(Request $req)
    {
        $headers = ["Content-type:multipart/form-data"];

        $data = [
            "title" => $req->title,
            "price" => $req->price,
            "ageClassification" => 10,
            "category" => $req->category,
            "author" => (json_decode(session()->get('user')))->code,
            "description" => $req->description,
            "tags" => explode(',', $req),
            "project" => $req->project->path(),
            "mainImage" => $req->mainImage->path()
        ];

        $options = [
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        $ch = curl_init("http://$this->backend/project");
        @curl_setopt_array($ch, $options);

        $result = curl_exec($ch);

        // If exist error redirec /
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            // If exist the server error redirect /
            if ($info['http_code'] == 200) {

                // If can't register project redirect /projeto
                if ($result != null) {
                    session(["user" => $result]);
                    return redirect('/');
                } else {
                    abort(500);
                }
            } else {
                abort(500);
            }
        } else {
            abort(500);
        }
    }

    public function showUser()
    {
        // return view('show-user', ["data" => session()->get('user')]);
        return view('show-user', ["data" => (object) [
            "username" => "Matheus Farbiano",
            "email" => "matheus.test01@gmail.com",
            "biografy" => "Clita ut aliquyam est labore justo eirmod accusam no sea sanctus, lorem magna et vero justo sit stet diam amet, gubergren consetetur diam sanctus stet consetetur, dolor consetetur dolor amet justo, no sed magna vero diam est consetetur rebum tempor, amet vero voluptua lorem sadipscing ut, lorem eirmod et eos.",
            "created_projects" => [
                (object) [
                    "title" => "first-project",
                    "category" => (object) [
                        "id" => "test",
                        "category" => "contruction"
                    ],
                    "author" => (object) [
                        "id" => "test",
                        "username" => "Matheus Farbiano"
                    ]
                ]
            ],
            "folders" => [
                (object) [
                    "id" => "test",
                    "path" => "first-projects"
                ]
            ]
        ]]);
    }
}
