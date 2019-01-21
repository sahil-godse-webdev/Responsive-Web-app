<html>
    <head>
        <title>Demo app in ajax and php</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="../jquery-3.3.1.min.js"></script>
        <script src="../jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                getallstudents("");
                
                $('#isave').click(function(){
                    //alert();
                    $name= $("#iname").val();
                    $mail= $("#imail").val();
                    $dob= $("#idob").val();
                    var x= new XMLHttpRequest();
                    x.open('GET','insert.php?name='+$name+"&mail="+$mail+"&dob="+$dob,true);
                    x.send();
                    x.onreadystatechange= function(){
                        if(x.readyState == 4){
                            //$("#added").html(x.responseText);
                            $("#exampleModal").fadeOut();
                            alert("Data Inserted Successfully!!");
                            //$("#exampleModal").hide();
                            location.reload();  /* for reloading the screen */
                            //getallstudents("");
                            
                        }
                    }
                })
                
                
                $(".search").keyup(function(){
                    var word= $(this).val();
                    //alert(word); 
                    getallstudents(word);
                })
                
                function getallstudents(a){
                    var x= new XMLHttpRequest();
                    x.open('GET','getallstudents.php?word='+a,true);
                    x.send();
                    x.onreadystatechange= function(){
                        if(x.readyState==4){
                            var obj= $.parseJSON(x.responseText);
                            console.log(obj);
                            $("tbody").html("");
                            for(i=0;i<obj.length;i++){
                                $("#tbody").append("<tr><td>"+obj[i]['sid']+"</td><td>"+obj[i]['sname']+"</td><td>"+obj[i]['semail']+"</td><td>"+obj[i]['sdob']+"</td><td><button type='button' data-toggle='modal' data-target='#umodal' class='edit btn btn-primary' id='"+obj[i]['sid']+"'>Edit</button></td><td><button id='"+obj[i]['sid']+"' type='button' class='btn btn-danger delete'>Delete</button></td></tr>");
                            }
                            $(".delete").on("click",deletenode);
                            $(".edit").on("click",editdata);   
                        }
                    }
                    
                }
                
                function editdata(){
                    //$("#umodal").fadeIn();
                    var id= this.id;
                    edit(id);
                }
                
                function edit(id){
                        //alert(id);
                    $("#usave").click(function(){
                            
                            var name= $("#uname").val();
                            var mail= $("#umail").val();
                            var dob= $("#udob").val();
                            var x= new XMLHttpRequest();
                            x.open('GET',"edit.php?id="+id+"&name="+name+"&mail="+mail+"&dob="+dob,true);
                            x.send();
                            x.onreadystatechange= function(){
                                if(x.readyState==4){
                                    $("#umodal").fadeOut();
                                    alert("Data Updated Successfully!!");
                                    //getallstudents("");
                                    location.reload();
                                    
                                }
                            }    
                        })                      
            
                }
              
                
                
                function deletenode(){
                    var id = this.id;
                    //alert(id);
                    var x= new XMLHttpRequest();
                    x.open('GET','delete.php?id='+id,true);
                    x.send();
                    x.onreadystatechange= function(){
                        if(x.readyState==4){
                            alert(x.responseText);
                            //getallstudents();
                            location.reload();
                        }
                    }
                }
                
                
            });
        </script>
    </head>
    <body>
        <div class="container pt-5">
                <!--update modal-->
                <div class="modal fade" id="umodal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Records</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body"> 
                          <label>Name</label><br>
                          <input type="text" class="form-control" id="uname"><br>
                          <label>Email</label><br>
                          <input type="email" class="form-control" id="umail"><br>
                          <label>Date of Birth</label><br>
                          <input type="date" class="form-control" id="udob"><br>
                      </div>
                      <div class="modal-footer">
                        <span style="float: left;" id="added" class="ml-1 text-success"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="usave" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
            
            
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Students Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body"> 
                          <label>Name</label><br>
                          <input type="text" class="form-control" id="iname"><br>
                          <label>Email</label><br>
                          <input type="email" class="form-control" id="imail"><br>
                          <label>Date of Birth</label><br>
                          <input type="date" class="form-control" id="idob"><br>
                      </div>
                      <div class="modal-footer">
                        <span style="float: left;" id="added" class="ml-1 text-success"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="isave" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
            

            <h1 class="mb-3">Students <button style="float: right; cursor: pointer;" type="button" class="btn btn-success mt-3 mr-5" data-toggle="modal" data-target="#exampleModal">Add Student</button> </h1>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
              </div>
              <input type="text" class="form-control search" placeholder="Search by name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <table class="table mt-4">
                <thead>
                    <tr class="text-center table-primary">
                        <th>SId</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Dob</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-center">
                    
                </tbody>
            </table>
        </div>
    </body>
</html>