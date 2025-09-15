<div class="content-wrapper">
  <div class="card container pb-3 pb-3">
    <div class="main_tree">
      <div class="container">
        <div class="row">
          <div>
            <form method="POST">
              <input type="text" name="regId" value="<?php echo isset($_POST['regId']) ? $_POST['regId'] : $this->session->userdata('regId'); ?>" />
              <button type="submit">Search</button>
            </form>
          </div>
          <!--
    We will create a family tree using just.
    The markup will be simple nested lists
    -->
          <div class="tree pb-4">

            <ul class="remove_before">
              <?php
              if (isset($_POST['regId'])) {
                $currentUser = $_POST['regId'];
              } else {
                // $currentUser = 47;
                $currentUser = $this->session->userdata('regId');
              }
              // $currentUser = $this->session->userData('regId');
              $sql = "SELECT * from users where regId='" . $currentUser . "'";
              $query = $db->query($sql);
              $result = $query->result();
              if (count($result) > 0) {
                $user = $result[0];
                // if ($user->role == 'superAdmin' || $user->role == 'admin') {
                //   $currentuser =$user->le 
                // } else {
                // }
                $currentUser = $user->id;
              }

              $level = 0;
              $dataTotal = [];
              function getUser($id, $level, $str, $db)
              {
                // $maxSize = 80;
                // $maxLevel = 9;
                if (!$id)
                  return $str;
                $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
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


                  $max_width = 60;
                  $max_depth = 15;
                  $width = (int)($max_width - ($max_width * $level / $max_depth));
                  $str .= '
                <li>
                <a href="#">
                <div class="wrapper2">
                  <div class="tooltip">
                    <b>Introducer Code :</b> ' . $user->par_reg_id . '
                    <br />
                    <b>Member Code :</b> '. $user->regId .'
                    <br />
                    <b>Member Name :</b> '. $user->firstName . ' ' . $user->middleName . ' ' . $user->lastName .'
                    <br />
                    
                   
                  </div>
                  <div class="tree_profile_img" style="background-image: url(' . base_url("assets/images/profile.jpg") . '); width: ' . $width . 'px; height: ' . $width . 'px;"></div>
                  <p>' . $user->regId . '</p>
                  <p>' . $user->firstName . ' ' . $user->middleName . ' ' . $user->lastName . '</p>
                </div>
              </a>
                ';


                  if ($user->leftChild || $user->rightChild) {
                    $str .= '<ul>';
                    $str .=  getUser($result[0]->leftChild, $level, '', $db);
                    $str .=  getUser($result[0]->rightChild, $level, '', $db);
                    $str .= '</ul>';
                  }

                  $str .= '</li>';
                  // echo $str;
                  return $str;
                }
                return $str;
              }

              function getUser1($id, $level, &$data, $db)
              {
                // $maxSize = 80;
                // $maxLevel = 9;
                $sql = "SELECT u.*, p.firstName as par_firstName, p.regId as par_reg_id, lc.firstName as left_child_firstName, rc.firstName as right_child_firstName FROM users u LEFT JOIN users p ON p.id = u.parentNode LEFT JOIN users lc on lc.id = u.leftChild LEFT JOIN users rc on rc.id = u.rightChild where u.id='" . $id . "'";
                $query = $db->query($sql);
                $result = $query->result();
                if ($level == 0) {
                  $data[$result[0]->id] = $result[0];
                } else {
                  $data[$result[0]->id] = $result[0];
                  $tempData = (array)$data[$result[0]->parentNode];
                  $tempData[$result[0]->side] = $result[0];
                  $data[$result[0]->parentNode] = (object)$tempData;
                  // $data[$result[0]->parentNode][$result[0]->side] = $result[0];
                }


                $level++;
                // if ($level == 3) return $data;
                if ($result[0]->leftChild && $result[0]->leftChild != "")
                  getUser($result[0]->leftChild, $level, $data, $db);
                if ($result[0]->rightChild && $result[0]->rightChild != "")
                  getUser($result[0]->rightChild, $level, $data, $db);
                else {
                  // if ($result[0]->side && $result[0]->side == 'right') {
                  // echo "</ul></li>";
                  // }

                  return $data;
                }
              }
              function showUser($users, $userId, $str, $level)
              {
                if (!$userId)
                  return $str;

                $user = $users[$userId];
                $max_width = 60;
                $max_depth = 15;
                $width = (int)($max_width - ($max_width * $level / $max_depth));
                $str .= '
                <li>
                <a href="#">
                <div class="wrapper2">
                  <div class="tooltip">
                    <b>Introducer Code :</b> ' . $user->par_reg_id . '
                    <br />
                    <b>Introducer Code :</b> PFA748365
                    <br />
                   
                  </div>
                  <div class="tree_profile_img" style="background-image: url(' . base_url("assets/images/profile.jpg") . '); width: ' . $width . 'px; height: ' . $width . 'px;"></div>
                  <p>' . $user->regId . '</p>
                  <p>' . $user->firstName . ' ' . $user->middleName . ' ' . $user->lastName . '</p>
                </div>
              </a>
                ';


                if ($user->leftChild || $user->rightChild) {
                  $str .= '<ul>';
                  $str .= showUser($users, $user->leftChild, '', $level++);
                  $str .= showUser($users, $user->rightChild, '', $level++);
                  $str .= '</ul>';
                }

                $str .= '</li>';
                // echo $str;
                return $str;
              }
              // getUser($currentUser, $level, $dataTotal, $db);
              // // echo "<pre>";
              // // print_r($dataTotal);
              // // echo "</pre>";
              // $user = $dataTotal[$currentUser];
              // $str2 = showUser($dataTotal, $user->id, '', 0);
              // echo $str2;
              $str3 = getUser($currentUser, $level, "", $db);
              echo $str3;
              ?>

            </ul>

          </div>
        </div>
      </div>
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
  }

  .wrapper2 .tooltip {
    background-color: rgba(0, 0, 0, 0.8);
    bottom: 20%;
    color: #fff;
    display: block;
    left: -45px;
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
    border-top: solid #000 10px;
    bottom: -8px;
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
    padding: 30px 10px 0 10px;

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
    line-height: 0px;
    font-weight: normal;
    font-size: 14px;
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
  }
</style>