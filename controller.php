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
            WHERE Tai_Khoan LIKE  "' . $userAccout . '";';
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
            WHERE Tai_Khoan LIKE  "' . $userAccout . '";';
    $KH = mysqli_query(connectDB(), $sql);
    $row = mysqli_fetch_row($KH);
    return $row[0];
}

function logout()
{
    unset($_SESSION['currentUser']);
    session_destroy();
}
// login('kh001', '1111');
//pagination
// function pagination()
// {
//     // set limit rows per page
//     $results_per_page = 4;
    
// }
