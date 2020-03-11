<?php
  function create_table($conn, $table_name)
  {
      $flag="NO";
      $sql = "show tables from sliceofthemoon";
      $result = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));

      while ($row=mysqli_fetch_row($result)) {
          if ($row[0]==="$table_name") {
              $flag="OK";
              break;
          }
      }
      if ($flag=="NO") {
          switch ($table_name) {
        case 'members':
          $sql = "CREATE TABLE `members` (
          `id` varchar(10) NOT NULL,
          `password` varchar(20) NOT NULL,
          `name` varchar(10) NOT NULL,
          `phone` varchar(20) NOT NULL,
          `regist_day` char(20) NOT NULL,
          `point` int,
          PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
          break;
          case 'qna':
            $sql = "CREATE TABLE `qna` (
             `num` int(11)  NOT NULL AUTO_INCREMENT,
             `group_num` int(10) NOT NULL,
             `depth` int(10) NOT NULL,
             `ord` int(10) NOT NULL,
             `id` char(15) NOT NULL,
             `subject` varchar(100) NOT NULL,
             `content` text NOT NULL,
             `regist_day` char(20) NOT NULL,
             `hit` int(3) ,
         PRIMARY KEY (`num`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
            case 'review':
              $sql = "CREATE TABLE `review` (
               `num` int(11)  NOT NULL AUTO_INCREMENT,
               `group_num` int(10) NOT NULL,
               `depth` int(10) NOT NULL,
               `ord` int(10) NOT NULL,
               `id` char(15) NOT NULL,
               `subject` varchar(100) NOT NULL,
               `content` text NOT NULL,
               `regist_day` char(20) NOT NULL,
               `hit` int(3) ,
           PRIMARY KEY (`num`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
              break;
        case 'notice':
          $sql = "CREATE TABLE `notice` (
            `num` int(11)  NOT NULL AUTO_INCREMENT,
            `id` char(15) NOT NULL,
            `subject` varchar(100) NOT NULL,
            `content` text NOT NULL,
            `regist_day` char(20) NOT NULL,
            `hit` int(3) ,
          PRIMARY KEY (`num`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
          break;
        default:
          echo "<script>alert('해당된 테이블 이름이 없습니다.');</script>";
          break;
      }
          if (mysqli_query($conn, $sql)) {
              echo "<script>alert('$table_name 테이블이 생성되었습니다.');</script>";
          } else {
              echo "실패원인".mysqli_error($conn);
          }
      }
  }
