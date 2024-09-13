<form action="" method="post" enctype="multipart/form-data"> if we want to send data of form into another page we put location into action attribute

********note for new developer***********
1. never open button tag inside anchor tag it may give u problem if ur method of form tag is post
2. //& is used to put multiple parameter in url for get example-> <a href=admin_post.php?source=edit_post&p_id=10>
3. If u want to call mutiple data through checkbox or somthing u want to give class name insted of id to that perticular
   element, if u use id-> as per rules id called once even if u used loop but class can be callable multiple times... so 
   be carefully and call class insted of id if u use those elements multiple times. 

************Query to select all checkboxes************
$(document).ready(function(){
  $('#SelectAllCheckbox').click(function(event){
    if(this.checked){
      $('.CheckBoxes').each(function(){
        this.checked=true;
      })
    }else{
      $('.CheckBoxes').each(function(){
        this.checked=false;
      })
    }
  })
})
********End************

**********Pagination Logic****************
total number of rows in db=mysqli_num_row(); //suppose there is 10 rows
limit per page to display records of table = 5;
total pages = total number of rows in db / 5; 
            = 10/5
            =ceil(5);

//inside unorderd list
for($i=1;$i<=count;$i++){
  echo "<li><a href='index.php?pages=echo $i'>$i</a></li>";
}