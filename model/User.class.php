<?php
class User extends Model{
    public function getAllUsers($data=null)
    {
        include_once ROOT_PATH.'model/User.class.php';
            include_once ROOT_PATH.'model/Comment.class.php';
            $userModel=new User();
            $commentModel=new Comment();
            $comment=$this->selectMany($data);
        for ($i=0;$i<count($comment);$i++) {
            //得到vinegar表中的category_id
            $user_id=$comment[$i]['user_id'];
            //得到category表中对应vinegar表中的categoryid的姓名
            $user_image=$userModel->select(['image'=>$comment_id])['image'];
            $user[$i]['image']=$user_image;

            //得到花语
            $comment_id=$user[$i]['comment_id'];
            $commentAll=$commentModel->selectMany();
            $content="";
            foreach ($commentAll as $item) {
                if (strstr($comment_id, $item['id']) !=false) { //判断子串
                    if ($content=="") {
                        $content=$item['content'];
                    } else {
                        $content= $content.",".$item['content'];
                    }
                }
            }
            $user[$i]['content']=$content;
        }
        return $user;
    }
}



