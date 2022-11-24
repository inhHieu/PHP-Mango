<?php
// Ket noi CSDL
function connectDB()
{ 
    $conn = mysqli_connect('localhost', 'root', '', 'mango');
    if ($conn->connect_error) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    } else return $conn;
}

function login($userAccout, $userPassword)
{
    global $noti;
    $sql = 'SELECT Mat_Khau, Ten_KH, Tai_Khoan FROM khach_hang
            WHERE Tai_Khoan =  "' . $userAccout . '";';
    $KH = mysqli_query(connectDB(), $sql);
    $row = mysqli_fetch_row($KH);
    if ($row != null) {
        if ($userPassword == $row[0]) {
            // echo $row[0];
            $_SESSION['currentUser'] = getUserName($userAccout);
            $noti = 'login success';
            return $noti;
        } else {
            $noti = 'Password incorrect';
            return $noti;
        }
    } else {
        $noti = 'Cant found Userid';
        return $noti;
    }
}
function getUserName($userAccout)
{
    $sql = 'SELECT Ten_KH FROM khach_hang
            WHERE Tai_Khoan =  "' . $userAccout . '";';
    $KH = mysqli_query(connectDB(), $sql);
    $row = mysqli_fetch_row($KH);
    return $row[0];
}

function logout()
{
    unset($_SESSION['currentUser']);
    session_destroy();
}

function signUp($name, $sdt, $email, $username, $password){
    global $noti;
    // $sql='SELECT Ma_KH, Tai_Khoan, SDT, Email FROM khach_hang WHERE '



    $sql = 'INSERT INTO khach_hang (Ma_KH, Ten_KH, Gioi_Tinh, Dia_Chi, SDT, Email, Tai_Khoan, Mat_khau, Ma_CV) 
            VALUES (NULL, "'.$name.'", "0", NULL, "'.$sdt.'", "'.$email.'", "'.$username.'", "'.$password.'", "KH");';
   
    if (connectDB()->query($sql)) {
        $_SESSION['currentUser'] = getUserName($username);
        $noti = "signup success";
        return $noti;
        // $response = "Data Added successfully";
    } else {
        $noti = "fails";
        return $noti;
        // $response = "Something is wrong: <br>" . $sql;
    }
}

// login('kh001', '1111');
//pagination
// function pagination()
// {
//     // set limit rows per page
//     $results_per_page = 4;
    
// }
