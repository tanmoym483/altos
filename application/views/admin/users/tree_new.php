<div class="content-wrapper">
    <div class="card container pb-3 pb-3" style="min-height:500px;">
        <div class="main_tree">
            <?php
      $prevId = "";
      $currentUserRole = $this->session->userData('role');
      $currentUser = "";
      if (isset($_POST['regId'])) {
        $currentUser = $_POST['regId'];
      } elseif (isset($_GET['v'])) {
        $currentUser = base64_decode($_GET['v']);
      } else {
        // $currentUser = 47;
        $currentUser = $this->session->userdata('regId');


        if ($currentUserRole == 'superAdmin') {
          // $sql = "SELECT * from users where role<>'superAdmin' limit 1";
          // $query = $db->query($sql);
          // $result = $query->result();
          // $currentUser = $result[0]->regId;

        }
      }
      ?>
            <!-- <div>
        <h3>Admin Users:</h3>
      </div> -->
            <!-- <div class="row">
        <?php //foreach ($vendors as $v) { 
        ?>
          <div class="col-lg-2 col-3">
            <div class="small-box ">
              <div class="inner">
                <h5><a href="<?php //echo base_url("/users/tree?v=") . base64_encode($v->regId); 
                              ?>"><?php echo $v->firstName . ' ' . $v->middleName . ' ' . $v->lastName; ?></a></h5>

                <p><?php //echo $v->regId; 
                    ?></p>
              </div>

            </div>
          </div>
        <?php //} 
        ?>
      </div> -->
            <div class="p-4">
                <form method="POST">
                    <input type="text" name="regId" value="<?php echo $currentUser; ?>" />
                    <button type="submit">Search</button>
                </form>
            </div>

            <!--
    We will create a family tree using just.
    The markup will be simple nested lists
    -->
            <?php
      if (($currentUserRole === 'superAdmin' && $currentUser === $this->session->userdata('regId'))) {
      ?>
            <div class="text-center mt-4">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Stox Logo"
                    class="elevation-3 p-4 bg-dark" />
            </div>
            <h4 class="mt-4 pb-4 text-center"><strong>Admin</strong></h4>
            <?php } ?>
            <div class="table-responsive main-tree_hold">


                <ul class="table main_user2" style="width:540px; margin: 0 auto; text-align: center;">
                    <?php

          // $currentUser = $this->session->userData('regId');
          // $sql = "SELECT * from users where regId='" . $currentUser . "'";
          if (($currentUserRole === 'superAdmin' && $currentUser !== $this->session->userdata('regId')) || $currentUserRole !== 'superAdmin') {
            $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.regId='" . $currentUser . "'";
            $query = $db->query($sql);
            $result = $query->result();
            if (count($result) > 0) {
              $user = $result[0];
              $prevId = $user->par_reg_id;
              // if ($user->role == 'superAdmin' || $user->role == 'admin') {
              //   $currentuser =$user->le 
              // } else {
              // }
              $currentUser = $user->id;
            }
          }

          $level = 0;
          function getChildCount($id, &$childs, &$activeChilds, $db)
          {
            if (!$id) {
              return;
            }
            $min_security_amount = 1000;
            // $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
            $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName, (select sum(amount) from transactions where transType='deposite' and userId = " . $id . " GROUP BY userId ) as deposite_amount FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
            $query = $db->query($sql);
            $result = $query->result();
            if (count($result) > 0) {
              $childs++;
              if ($result[0]->deposite_amount && $result[0]->deposite_amount > $min_security_amount)
                $activeChilds++;
              getChildCount($result[0]->leftChild, $childs, $activeChilds, $db);
              getChildCount($result[0]->rightChild, $childs, $activeChilds, $db);
            }
          }
          function getUser($id, $level, $str, $db, $side = null)
          {
            // $maxSize = 80;
            $props = '';
            $ulProps = '';
            $imgSize = 100;
            $tooltipTop = -30;
            $tooltipLeft = 0;
            $max_width = 70;
            $max_depth = 10;
            $width = (int)($max_width - ($max_width * $level / $max_depth));
            $maxLevel = 3;
            if ($level == 0) {
              $tooltipTop = 50;
              $tooltipLeft = 0;
              $ulProps = 'class="border_before" style="border-top: 2px solid #000; width:500px; "';
            } elseif ($level == 1) {
              $ulProps = 'class="border_before" style="width: 250px;  margin-left: -60px; border-top: 2px solid #000;"';
              $imgSize = 80;
              if ($side == 'left') {
                $tooltipTop = 30;
                $tooltipLeft = -45;
                $props =  'style="float: left; text-align: left; margin-left: -105px; width: 130px;"';
              } else {
                $tooltipTop = 30;
                $tooltipLeft = -45;
                $props = 'style="float: right; text-align: right; margin-right: -65px; width: 130px;"';
              }
            } elseif ($level == 2) {
              $imgSize = 60;
              $ulProps = 'class="border_before" style="width: 150px; margin-left: -25px; border-top: 2px solid #000;"';
              if ($side == 'left') {
                $tooltipTop = 30;
                $tooltipLeft = -50;
                $props =  'style="float: left; width: 100px; text-align: left; margin-left: -90px;"';
              } else {
                $tooltipTop = 30;
                $tooltipLeft = -50;
                $props = 'style="float: right; width: 100px; text-align: right; margin-right: -50px;"';
              }
            } else {
              $imgSize = 40;
              $ulProps = 'class="border_before" style="width: 150px; margin-left: -30px; border-top: 2px solid #000;"';
              if ($side == 'left') {
                $tooltipTop = 30;
                $tooltipLeft = -60;
                $props =  'style="float: left; width: 100px; text-align: left; margin-left: -88px;"';
              } else {
                $tooltipTop = 30;
                $tooltipLeft = -60;
                $props = 'style="float: right; width: 100px; text-align: right; margin-right: -50px;"';
              }
            }

            if (!$id)
              return '
              <li ' . $props . '>
              <div class="tree_profile_img" style="background-image: url(' . base_url("assets/assets/images/member2.png") . '); width:  ' . $width . 'px; height: ' . $width . 'px;"></div>
              <div class="wrapper2">
              
              </div>
              </li>
              
              
              ';
            // return $str;
            elseif ($level > $maxLevel)
              return $str;
            $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName, (select sum(amount) from transactions where transType='deposite' and userId = " . $id . " GROUP BY userId ) as deposite_amount FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
            $query = $db->query($sql);
            $result = $query->result();
            if (count($result) > 0) {
              $user = $result[0];

              // if ($level == 0) {
              //   $data[$result[0]->id] = $result[0];
              // } else {
              //   $data[$result[0]->id] = $result[0];
              //   $tempData = (array)$data[$result[0]->parentNode];
              //   $tempData[$result[0]->side] = $result[0];
              //   $data[$result[0]->parentNode] = (object)$tempData;
              //   // $data[$result[0]->parentNode][$result[0]->side] = $result[0];
              // }

              // $background = $user->gender === 'Male' ? base_url("assets/images/profile.jpg") : base_url("assets/images/profile2.jpg");
              // $props = ($level == 0 ? "" : ($level == 1 ? ($user->side == 'Left' ? 'style="float: left; text-align: left; margin-left: -105px; width: 130px;"' :
              //   'style="float: right; text-align: right; margin-right: -65px; width: 130px;"') :
              //   $level == 2 ? ($user->side == 'Left' ? 'style="float: left; width: 100px; text-align: left; margin-left: -90px;"' : 'style="float: right; width: 100px; text-align: right; margin-right: -50px;"') : ($user->side == 'Left' ? '' : '')));

              $background = $user->gender === 'Male' ? ($user->deposite_amount > 1 ? base_url("assets/images/male.png") : base_url("assets/images/red_male.png")) : ($user->deposite_amount > 1 ? base_url("assets/images/female.png") : base_url("assets/images/red_female.jpg"));
              $leftChilds = 0;
              $rightChilds = 0;
              $leftActiveChilds = 0;
              $rightActiveChilds = 0;
              getChildCount($user->leftChild, $leftChilds, $leftActiveChilds, $db);
              getChildCount($user->rightChild, $rightChilds, $rightActiveChilds, $db);
              $directDown = ($leftChilds > 0 ? 1 : 0) + ($rightChilds > 0 ? 1 : 0);
              $str .= '
              <li ' . $props . '>
             
              <a href="' . base_url("/users/tree?v=") . base64_encode($user->regId) . '">
               <div class="tree_profile_img" style="background-image: url(' . $background . '); width:' . $imgSize . 'px; height: ' . $imgSize . 'px; " ></div>
                <div class="wrapper2">
                <div class="tree_text">
                                <p>' . $user->regId . '</p>
                  <p>' . $user->firstName . ' ' . $user->middleName . ' ' . $user->lastName . '</p>
                              </div>
                  <div class="tooltip" style="top: ' . $tooltipTop . 'px; left: ' . $tooltipLeft . 'px;">
                    <b>Introducer Code :</b> ' . $user->par_reg_id . '
                    <br />
                    <b>Member Code :</b> ' . $user->regId . '
                    <br />
                    <b>Member Name :</b> ' . $user->firstName . ' ' . $user->middleName . ' ' . $user->lastName . '
                    <br />
                    <b>Security Deposit :</b> ' . $user->deposite_amount . '
                    <br />
                    <b>Direct Downline Count :</b> ' . $directDown . '
                    <br />
                    <b>Downline Count :</b> ' . $leftChilds + $rightChilds . '
                    <br />
                    <b>Active Left Direct:</b> ' . $leftActiveChilds . '
                    <br />
                    <b>Active Right Direct :</b> ' . $rightActiveChilds . '
                  </div>
                 
                 
                </div>
              </a>
          ';
              $level++;

              // if ($user->leftChild || $user->rightChild) {
              if ($level > $maxLevel) {
              } else {
                $str .= '<ul ' . $ulProps . '>';
                $str .=  getUser($result[0]->leftChild, $level, '', $db, 'left');
                $str .=  getUser($result[0]->rightChild, $level, '', $db, 'right');
                $str .= '</ul>';
              }
              // }

              $str .= '</li>';
              // echo $str;
              return $str;
            }
            return $str;
          }
          if (($currentUserRole !== 'superAdmin') || ($currentUserRole === 'superAdmin' && $currentUser !== $this->session->userdata('regId'))) {
            $str3 = getUser($currentUser, $level, "", $db);
            echo $str3;
          }
          ?>

                </ul>
            </div>
            <?php if ($prevId) { ?>
            <!--<div class="text-center mb-4">
          <a href="<?php //echo base_url("/users/tree?v=") . base64_encode($prevId); ?>" class="btn btn-primary">Back</a>
        </div>-->
            <?php } ?>

        </div>
    </div>
</div>

<style type="text/css">
.wrapper2 {
    text-transform: uppercase;
    color: #555;
    cursor: help;
    padding: 5px;
    position: relative;
    text-align: center;
    -webkit-transform: translateZ(0);
    /* webkit flicker fix */
    -webkit-font-smoothing: antialiased;
    /* webkit text rendering fix */
    font-weight: normal;
    z-index: 999;
    cursor: pointer;
}

.wrapper2 .tooltip {
    background-color: rgba(0, 0, 0, 0.8);
    color: #fff;
    display: block;
    left: -40px;
    margin-bottom: 15px;
    opacity: 0;
    padding: 15px;
    pointer-events: none;
    position: absolute;
    width: 225px;
    -webkit-transform: translateY(10px);
    -moz-transform: translateY(10px);
    -ms-transform: translateY(10px);
    -o-transform: translateY(10px);
    transform: translateY(10px);
    -webkit-transition: all .25s ease-out;
    -moz-transition: all .25s ease-out;
    -ms-transition: all .25s ease-out;
    -o-transition: all .25s ease-out;
    transition: all .25s ease-out;
    -webkit-box-shadow: 2px 2px 6px rgb(0 0 0 / 28%);
    -moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
    -ms-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
    -o-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
    box-shadow: 2px 2px 6px rgb(0 0 0 / 28%);
    margin: auto;
    right: 0;
    z-index: 9999;
    top: -25px !important;
}

/* This bridges the gap so you can mouse into the tooltip without it disappearing */
.wrapper2 .tooltip:before {
    bottom: -20px;
    content: " ";
    display: block;
    height: 20px;
    left: 0;
    position: absolute;
    width: 100%;
}

/* CSS Triangles - see Trevor's post */
.wrapper2 .tooltip:after {
    border-left: solid transparent 10px;
    border-right: solid transparent 10px;
    border-bottom: solid #000 10px;
    top: -8px;
    content: " ";
    height: 0;
    left: 50%;
    margin-left: -13px;
    position: absolute;
    width: 0;
}

.wrapper2:hover .tooltip {
    opacity: 1;
    pointer-events: auto;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px);
}

/* IE can just show/hide with no transition */
.lte8 .wrapper .tooltip {
    display: none;
}

.lte8 .wrapper:hover .tooltip {
    display: block;
}

.main_tree {
    width: 100%;
    margin: 0 auto;
}

.tree ul {
    padding-top: 20px;
    position: relative;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 30px 15px 0 15px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before,
.tree li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 2px solid #062198;
    width: 50%;
    height: 20px;
}

.tree li::after {
    right: auto;
    left: 50%;
    border-left: 2px solid #062198;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after,
.tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child {
    padding-top: 0;
}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before,
.tree li:last-child::after {
    border: 0 none;
}

/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before {
    border-right: 2px solid #062198;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}

.tree li:first-child::after {
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul.remove_before::before {
    border-left: 0px;
}

.tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 2px solid #062198;
    width: 0;
    height: 20px;
}

.tree li a {
    border: none;
    padding: 5px 10px;
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;

    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li a p {
    line-height: 18px;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover,
.tree li a:hover+ul li a {
    background: none;
    color: #000;
    border: none;
}

/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before {
    border-color: #03235a;
}

.tree_profile_img {
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    margin: 0 auto;
    margin-bottom: 10px;
    border: 2px solid #ffffff;
    position: relative;
    z-index: 0;
    margin-top: 10px;
}

.tree_text {
    position: relative;
    padding-top: 85px;
    margin-top: -95px;
}

.tree_text p {
    margin-bottom: 0px;
}
</style>