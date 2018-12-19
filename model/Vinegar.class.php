<?php

class Vinegar extends Model
{
    public function getAllVinegars($data=null)
    {
        include_once ROOT_PATH.'model/Category.class.php';
            include_once ROOT_PATH.'model/Comment.class.php';
            $cateModel= new Category();
            $commentModel= new Comment();
            $vinegar=$this->selectMany($data);
        for ($i=0;$i<count($vinegar);$i++) {
            //得到vinegar表中的category_id
            $category_id=$vinegar[$i]['category_id'];
            //得到category表中对应vinegar表中的categoryid的姓名
            $category_name=$cateModel->select(['category_id'=>$category_id])['category_name'];
            $vinegar[$i]['category_name']=$category_name;

            $comment_id=$vinegar[$i]['comment_id'];
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
            $vinegar[$i]['content']=$content;
        }
        return $vinegar;
    }

    public function getAllUsers($data=null)
    {
        include_once ROOT_PATH.'model/User.class.php';
            include_once ROOT_PATH.'model/Comment.class.php';
            $userModel=new User();
            $commentModel=new Comment();
            $comment=$this->selectMany($data);
        for ($i=0;$i<count($user);$i++) {
            //得到vinegar表中的category_id
            $comment_id=$comment[$i]['user_id'];
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



    public function getvinegarById($id)
{
    include_once ROOT_PATH.'model/Category.class.php';
    include_once ROOT_PATH.'model/Comment.class.php';
    $cateModel=new Category();
    $commentModel=new Comment();
    $vinegar=$this->select(['category_id'=>$id]);
    $category_name=$cateModel->select(['category_id'=>$vinegar['category_id']])['name'];
    $vinegar['category_name']=$category_name;

    $comment_id=$vinegar['comment_id'];
    $commentAll=$commentModel->selectMany();
    $content="";
    foreach ($commentAll as $item)
    {
        if(strstr($comment_id,$item['id']) !=false) //判断子串
        {
            if($content=="")
            {
                $content=$item['content'];
            }else
            {
                $content= $content.",".$item['content'];
            }
        }
    }
    $vinegar['content']=$content;

    return $vinegar;
}
}

