<body>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email" class="text-info">el. paštas:</label><br>
                                <input type="email" name="email" id="email" class="form-control" <?php if(isset($data['email'])){echo "value={$data['email']}";}  ?> >
                            </div>
                            <div class="form-group">
                                <label for="pass" class="text-info">slaptažodis:</label><br>
                                <input type="password" name="pass" id="pass" class="form-control" <?php if(isset($data['pass'])){echo "value={$data['pass']}";}  ?>>
                            </div>
                            <div class="form-row">
                                <div class="form-group md-2">
                                    <input type="submit" name="submit" class="btn btn-info btn-md md-2" value="Prisijungti">
                                </div>
                                <?php
                                  if(isset($errorMsg))
                                  {
                                     echo  '<div class="form-group md-4">
                                         <p class="text-danger" style="padding-top: 5px ; padding-left: 10px">' . $errorMsg . '</p>
                                         </div>'; 
                                  }
                                ?>

                                
                            </div>
                        </form>


                        <h4> darbuotojų login:</h4>
                        
                        <form action="" method="post">
                            <input type="submit" name="submit" class="btn btn-info btn-md md-2" value="SKIP-ADMIN">
                            <input type="hidden" name="email" id="email" value="admin@admin">
                            <input type="hidden" name="pass" id="pass" value="admin">
                        </form>
                        <form action="" method="post">
                            <input type="submit" name="submit" class="btn btn-info btn-md md-2" value="SKIP-MODERATOR">
                            <input type="hidden" name="email" id="email" value="moderator@moderator.com">
                            <input type="hidden" name="pass" id="pass" value="moderator">
                        </form>
                        
</body>


