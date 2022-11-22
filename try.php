

<?php
include("../db.php");
      $hsql="SELECT * FROM header";
      $hresult=mysqli_query($conn,$hsql);
      $hrow=mysqli_fetch_assoc($hresult);
      ?>
    <section class="wrapper">
        <div class="row justify-content-center mt-5">
            <div class="col-9 text-center">
                <h1><b>HEADER</b></h1>
            </div>

        </div>
        <div class="row justify-content-center mt-4 text-center">
            <div class="col-11">
                  <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f1"><h6><b>Facebook Link</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control" value="<?= $hrow['flink'];?>" name="flink" id="f1" type="text">
                      </div>
                   
                  </div>
                  <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f2"><h6><b>Youtube Link</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control" value="<?= $hrow['ylink'];?>" name="ylink" id="f2" type="text">
                      </div>
                   
                  </div>
                  <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f3"><h6><b>Linkedin Link</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control" value="<?= $hrow['llink'];?>" name="llink" id="f3" type="text">
                      </div>
                   
                  </div>
                  <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f4"><h6><b>Contact Number</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control" value="<?= $hrow['contact'];?>" name="contact" id="f4" type="text">
                      </div>
                      </div>
                      <div class="form-group row ">
                          <div class="col-2 pt-2 text-dark ">
                              <label for="f6"><h6><b>Logo Image</b></h6></label>
                          </div>
                          <div class="col-7 ">
                            <div class="text-center"> <img src="../assets/<?= $hrow['image'];?>" class="img-fluid" alt="" id="imgc"> </div>
                          </div>
                          <div class="col-3 pt-2 text-dark ">
                              <input type="file" name="image"  class="form-control-file" onchange="imag(this)" id="f6" accept="image/*">
                          </div>
                       
                      </div>
                      <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f7"><h6><b>Button Link</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control" value="<?= $hrow['blink'];?> "name="blink" id="f7" type="text">
                      </div>
                   
                  </div>
                  <div class="form-group row ">
                      <div class="col-2 pt-2 text-dark ">
                          <label for="f8"><h6><b>Button Lable</b></h6></label>
                      </div>
                      <div class="col-10 ">
                          <input class="form-control"value="<?= $hrow['bname'];?>" name="blable" id="f8" type="text">
                      </div>
                   
                  </div>
                  
                  <button type="submit" id="upd" onclick="upd()"  name="submit" value="<?= $hrow['id'];?>" class="btn btn-primary">Update</button>
            
            </div>
        </div>
    </section> 
</section>
