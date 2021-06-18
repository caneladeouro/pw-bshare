<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public string $backend;

    public function __construct()
    {
        $this->backend = getenv('Webservice_HOST') . ":3100";
    }

    public function home()
    {
        $res = Http::get("http://$this->backend/projects");
        $projects = $res->json();

        // die($res->body());
        return view('home', ["projects" => $res->json(), "main_projects" => array_slice($projects, 0, 8)]);
    }

    public function signProject()
    {
        if (session()->exists('user')) {
            return view('cadastra-projeto');
        } else {
            return redirect('/');
        }
    }

    public function signPasta()
    {
        return view('cadastra-pasta');
    }

    public function projeto($id)
    {
        $res = Http::get("http://$this->backend/projects/$id");

        return view(
            'projeto',
            ["project" => $res->json(), "main_image" => "main_image", "image_field" => "image", "id" => "id"],
        );
    }

    public function pasta()
    {
        return view('pasta');
    }

    public function pesquisa($attribute)
    {
        $res = Http::get("http://$this->backend/projects/search/$attribute");

        return view('pesquisa', ["projects" => $res->json()]);
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
            "name_our_email" => $req->nameOurEmail,
            "password" => $req->password
        ];
        $headers = ["Content-type:application/json"];

        $ch = curl_init("http://$this->backend/users/log_in");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_PORT, 3100);
        $result = json_decode(curl_exec($ch));

        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            if ($info['http_code'] == 200) {
                if ($result != null) {
                    session(["user" => json_decode(json_encode($result), true)]);
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
        curl_setopt($ch, CURLOPT_PORT, 3100);

        $result = curl_exec($ch);

        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);

            if ($info['http_code'] == 200) {
                if ($result != null) {
                    session(["user" => json_decode(json_encode($result), true)]);
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

        $res = Http::attach("project", $req->project->path(), "test.blend")->post("http://$this->backend/projects", [
            "title" => $req->title,
            "description" => $req->description,
            "price" => $req->price,
            "category" => $req->category,
            "blender_version" => $req->versao_blender,
            "render_engine" => $req->render_engine,
            "category_id" => "24b88498-5e8b-3014-bb80-bdc0e11a9702",
            "author_id" => session()->get('user')["id"]
        ]);

        return redirect('/');
    }

    public function showUser()
    {
        $res = Http::get("http://$this->backend/users/" . session()->get('user')["id"]);
        session(["user" => $res->json()]);
        return view('show-user', ["data" => session()->get('user')]);
    }

    public function showAuthor($id)
    {
        $res = Http::get("http://$this->backend/users/" . $id);
        return view('show-user', ["data" => $res->json()]);
    }
}
