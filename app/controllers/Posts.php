<?php
    class Posts extends Controller {

        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }


        public function index() {
            //Get Posts
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];

            $this->view('posts/index', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'title' => ucwords(trim($_POST['title'])),
                    'body' => ucfirst(trim($_POST['body'])),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];

                //Validate Post data
                if(empty($data['title'])){
                    $data['title_error'] = 'Title should not be empty';
                }

                if(empty($data['body'])){
                    $data['body_error'] = 'Body should not be empty';
                }

                //Make sure there are no error
                if(empty($data['title_error']) && empty($data['body_error'])){
                    //Validated
                    if($this->postModel->addPost($data)){
                        flash('post_message','Post Added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    //Load the post view
                    $this->view('posts/add', $data);
                }

            } else {

            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts/add', $data);
            }
        }


        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'title' => ucwords(trim($_POST['title'])),
                    'body' => ucfirst(trim($_POST['body'])),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];

                //Validate Post data
                if(empty($data['title'])){
                    $data['title_error'] = 'Title should not be empty';
                }

                if(empty($data['body'])){
                    $data['body_error'] = 'Body should not be empty';
                }

                //Make sure there are no error
                if(empty($data['title_error']) && empty($data['body_error'])){
                    //Validated
                    if($this->postModel->updatePost($data)){
                        flash('post_message','Post Updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    //Load the post view
                    $this->view('posts/edit', $data);
                }

            } else {
                //Get existing post from model
                $post = $this->postModel->getPostById($id);

                //Check if the user is the post creator
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
                ];

            $this->view('posts/edit', $data);
            }
        }

        public function show($id) {
            $post = $this->postModel->getPostById($id);
            //Check not the original code
            if(!$post->user_id){
                redirect('posts');
            } else {
            $user = $this->userModel->getUserById($post->user_id);
            }

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id) {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Get existing post from model
                $post = $this->postModel->getPostById($id);

                //Check for the post owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }


                if($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed', 'alert alert-danger alert-dismissable fade show');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('posts');
            }
        }
    }