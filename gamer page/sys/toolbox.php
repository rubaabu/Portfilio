<?php

class toolbox {

    // Assembles error for forms
    // 1. Parameter is the current error message
    // 2. Parameter is the error message that we want to add
    // 3. Parameter is the id of the input tag
    // Output is the complete error message
    public function assembleError($currentError,$errorMsg,$id) {

        if ($currentError == '') {
            $currentError .= $id.'/2s'.$errorMsg;
        } else {
            $currentError .= '/1s'.$id.'/2s'.$errorMsg;
        }

        return $currentError;

    }

    // trim - strips whitespace (or other characters) from the beginning and end of a string
    // strip_tags — strips HTML and PHP tags from a string
    // htmlspecialchars converts special characters to HTML entities

    public function stripsTags($text) {

        $var = trim($text);
        $var = strip_tags($var);
        $var= htmlspecialchars($var);

        return $var;
    }

    // uploads checks if it is even a file with the right format
    // 1. Parameter the file itself NOT! in an array from $_FILES
    // 2. Parameter the directory name # avatar , group , post
    // 3. Parameter an array with every file format that is allowed
    // Output Error messages if failed
    // Output success if valid

    public function checkFile($file,$dir,$allowed_ext) {

        if (file_exists($file['tmp_name'])) {

            $info = pathinfo($file['name']);
            $extension = $info['extension'];
            $success = false;
    
            foreach ($allowed_ext as $key => $value) {
                if ($extension == $value) {
                    $success = true;
                    break;
                }
            }
    
            if ($success) {
                for ($i=0; $i < 10 ; $i++) { 
                    $success = true;
        
                    $new_name_str = $this->generateRandomString(11);
                    $target_folder = '../../view/src/post_img/'.$dir;
                    $files_in_folder = scandir($target_folder);
    
                    foreach ($files_in_folder as $key => $value) {
                        $value = explode('.',$value);
                        $value = $value[0];
                        if ($new_name_str == $value) {
                            $success = false;
                            break;
                        }
                    }
    
                    if ($success) {
                        break;
                    }
                }
    
                if ($success) {
                    $new_name = $new_name_str.'.'.$extension;
    
                    $target_dir = $target_folder.'/'.$new_name;

                    $file_location = $dir.'/'.$new_name;
    
                    return array(
                        $target_dir,
                        $file,
                        $file_location
                    );
                } else {
                    return 'Too many tries!';
                }
            } else {
                return 'Wrong file format!';
            }
        } else {
            return 'No file found';
        }

    }

    // Uploads File
    // 1. Parameter the file
    // 2. Parameter the target directory
    public function uploadFile($file,$target_dir) {
        move_uploaded_file($file['tmp_name'], $target_dir);
    }

    // Generates a random string / name
    // 1. Parameter the length of the string
    // Output the random string

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}