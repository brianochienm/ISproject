<?php
require_once 'dbconnection.inc.php';
session_start();

if (!isset($_SESSION['culprname']) && !isset($_SESSION['culprname1'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['culprname'];
  $query=mysqli_query($conn,"SELECT * FROM `tbl_users` WHERE `user_id`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
  $filter1 = $_SESSION['culprname1'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Connection - Culinary Provider Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css"> 
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/tooplate-antique-cafe.css">
    
</head>
        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
    color: white;
    font-size: 13px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>

            <script type="text/javascript">
function printData1()
{
   var divToPrint=document.getElementById("printTable1");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData1();
})  
</script>

            <script type="text/javascript">
function printData2()
{
   var divToPrint=document.getElementById("printTable2");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData2();
})  
</script>

<body>    
    <!-- Intro -->
    <div id="intro" class="parallax-window" data-parallax="scroll" data-image-src="img/b1.jpg">
        <nav id="tm-nav" class="fixed w-full">
            <div class="tm-container mx-auto px-2 md:py-6 text-right">
                <button class="md:hidden py-2 px-2" id="menu-toggle"><i class="fas fa-2x fa-bars tm-text-gold"></i></button>
                <ul class="mb-3 md:mb-0 text-2xl font-normal flex justify-end flex-col md:flex-row">
                    <li class="inline-block mb-4 mx-4"><a href="#" class="tm-text-gold py-1 md:py-3 px-4">Home</a></li>
                    <li class="inline-block mb-4 mx-4"><a href="#data" class="tm-text-gold py-1 md:py-3 px-4">View Database</a></li>
                    <li class="inline-block mb-4 mx-4"><a href="#module" class="tm-text-gold py-1 md:py-3 px-4">Culinary Provider Module</a></li>
                </ul>
            </div>            
        </nav>
        <div class="container mx-auto px-2 tm-intro-width">
            <div class="sm:pb-60 sm:pt-48 py-20">
                <div class="bg-black bg-opacity-70 p-12 mb-5 text-center">
                    <h1 class="text-white text-5xl tm-logo-font mb-5">Culinary Connection</h1>
                    <p class="tm-text-gold tm-text-2xl">Welcome <?php echo $row1['role']; ?>, <?php echo $row1['fullname']; ?>!</p>
                </div>    
                <div class="bg-black bg-opacity-70 p-10 mb-5">
                    <p class="text-white leading-8 text-sm font-light">
                        Embrace your culture, connect with your community, and savor the flavors of home with <b>together</b>.
                     <a rel="nofollow" href="#module" target="_parent">Culinary Provider Module</a>! </p>
                </div>
                <div class="text-center">
                    <div class="inline-block">
                        <a href="logout.php" class="flex justify-center items-center bg-black bg-opacity-70 py-6 px-8 rounded-lg font-semibold tm-text-2xl tm-text-gold hover:text-gray-200 transition">
                            <i class="fas fa-power mr-3"></i>
                            <span>Logout</span>                        
                        </a>
                    </div>                    
                </div>                
            </div>
        </div>        
    </div>

    <div id="data" class="parallax-window" data-parallax="scroll" data-image-src="img/b2.jpg">
        <div class="container mx-auto tm-container py-24 sm:py-48">
                                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                                                     <h2 class="mb-6 tm-text-green text-4xl font-medium">List of Market Items</h2>
                                                     <br>
                                           <table id="printTable1">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Name</th>
<th style="text-align: left;
  padding: 8px;">Type</th>
  <th style="text-align: left;
  padding: 8px;">Image</th>
 <th style="text-align: left;
  padding: 8px;">Price (in kshs.)</th>
   <th style="text-align: left;
  padding: 8px;">Quantity</th>
  <th style="text-align: left;
  padding: 8px;">Expiry Date (for Ingredients)</th>
   <th style="text-align: left; padding: 8px;"></th>
      <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$sql = "SELECT `Market_ID`, `Provider_Name`, `Item_Name`, `Item_Type`, `Image`, `Created_At`, `Expire_At`, `Price`, `Quantity` FROM `market` WHERE `Provider_Name` = '$filter1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Item_Name"]); ?> from <?php echo($row["Provider_Name"]); ?></td>
<td><?php echo($row["Item_Type"]); ?></td>
<td><img src="img/<?php echo($row["Image"]); ?>" style="width: 400px;" title="<?php echo($row["Item_Name"]); ?>"></td>
<td><?php echo($row["Price"]); ?></td>
<td><?php echo($row["Quantity"]); ?></td>
<td><?php echo($row["Expire_At"]); ?></td>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this item?')?window.location.href='insertion.inc.php?action=deleteM&id=<?php echo($row["Market_ID"]); ?>':true;" title='Delete Item'>Delete</button></td>
<?php
if($row["Quantity"] == 0){
?>
                    <form action="insertion.inc.php" method="POST" class="text-lg">
                        <input type="number" name="quan" min="0" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Quantity" required="" />
                        <input type="hidden" value="<?php echo $row['Market_ID']; ?>" required name="mid">
                        <div class="text-right">
                            <button type="submit" name="upM" class="text-white hover:text-yellow-500 transition">Update</button>
                        </div>                        
                      </form>
<?php
}else{
?>

<?php
}
?>
</tr>
<?php
}
} else { echo "No results"; }

?>

</table>
<br>
<br>
                <a onclick="printData1();" class="inline-block tm-bg-green transition text-white text-xl pt-3 pb-4 px-8 rounded-md">
                    Print Report
                </a>                       
                </div>
                                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                                                     <h2 class="mb-6 tm-text-green text-4xl font-medium">List of Orders</h2>
                                                     <br>
                                           <table id="printTable2">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Item</th>
<th style="text-align: left;
  padding: 8px;">Order Details</th>
  <th style="text-align: left;
  padding: 8px;">Timeline</th>
 <th style="text-align: left;
  padding: 8px;">Status</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$sql = "SELECT `orders`.`Order_ID`, `orders`.`Provider_Name`, `orders`.`Item_Name`, `Item_Type`, `orders`.`Buyer_Name`, `orders`.`Created_At`, `orders`.`Price`, `orders`.`Quantity`, `orders`.`Status`, `orders`.`Payment_Means`, `tbl_users`.`phone_number`, `tbl_users`.`email` FROM `orders` JOIN `tbl_users` ON `tbl_users`.`fullname` = `orders`.`Buyer_Name` WHERE `Provider_Name` = '$filter1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Item_Name"]); ?> by <?php echo($row["Buyer_Name"]); ?> reach out on <a href="mailto:<?php echo($row["email"]); ?>"><?php echo($row["email"]); ?></a> and <?php echo($row["phone_number"]); ?> </td>
<td><?php echo($row["Quantity"]); ?> at <?php echo($row["Price"] * $row["Quantity"]); ?> via <?php echo($row["Payment_Means"]); ?></td>
<td>Ordered At : <?php echo($row["Created_At"]); ?></td>
<td><?php echo($row["Status"]); ?></td>
<?php
if($row["Status"] == "Pending"){
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to complete this order?')?window.location.href='insertion.inc.php?action=completeO&id=<?php echo($row["Order_ID"]); ?>&id1=<?php echo($row["Item_Name"]); ?>&id2=<?php echo($row["Quantity"]); ?>':true;" title='Complete Order'>Complete</button></td>
<?php
}else{
?>

<?php
}
?>
</tr>
<?php
}
} else { echo "No results"; }

?>

</table>
<br>
<br>
                <a onclick="printData2();" class="inline-block tm-bg-green transition text-white text-xl pt-3 pb-4 px-8 rounded-md">
                    Print Report
                </a>                       
                </div>
        </div>        
    </div>

    <div class="parallax-window relative" data-parallax="scroll" data-image-src="img/b3.jpg">
        <div id="module" class="container mx-auto tm-container pt-24 pb-48 sm:py-48">
            <div class="flex flex-col lg:flex-row justify-around items-center lg:items-stretch">
                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                    <form action="insertion.inc.php" method="POST" class="text-lg">
                        <input type="text" name="fname" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Name" required="" />
                        <input type="hidden" value="<?php echo $filter; ?>" name="uid" required>
                        <input type="hidden" value="2" required name="mod">
                        <input type="text" name="phone" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Phone Number" required="" />
                        <input type="email" name="email" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Email" required="" />
                        <input type="password" name="password" minlength="8" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Password" required="" />
                        <input type="password" name="cpassword" minlength="8" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Confirm Password" required="" />
                        <div class="text-right">
                            <button type="submit" name="upu" class="text-white hover:text-yellow-500 transition">Update My Details</button>
                        </div>                        
                      </form>
                </div>
                        <div class="flex flex-col lg:flex-row justify-around items-center lg:items-stretch">
                <div class="flex-1 rounded-xl p-12 pb-14 m-5 bg-black bg-opacity-50 tm-item-container">
                    <form action="insertion.inc.php" method="POST" class="text-lg" enctype="multipart/form-data">
                        <input type="text" name="iname" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Name" required="" />
                        <input type="text" name="sprice" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Price" required="" />
                        <input type="number" name="quan" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold" placeholder="Quantity" min="0" required="" />
                        <br>
                        <label style="color: white;">Expiry Date (if Ingredient):</label>
                        <br>
                        <input type="date" min="<?php echo date('Y-m-d'); ?>" name="exp" minlength="8" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold"/>
                        <br>
                        <label style="color: white;">Item Image:</label>
                        <br>
                        <input type="file" accept=".png, .jpg, .jpeg" name="image" minlength="8" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold"/>
                        <select required name="itype" class="input w-full bg-black border-b bg-opacity-0 text-white px-0 py-4 mb-4 tm-border-gold">
                        <option selected disabled value="0">Select A Type</option>
                        <option value="Meal">Meal</option>
                        <option value="Ingredient">Ingredient</option>
                        </select>
                        <div class="text-right">
                            <button type="submit" name="addM" class="text-white hover:text-yellow-500 transition">Add A Market Item</button>
                        </div>                        
                      </form>
                </div>
            </div>
         </div>
            <footer class="absolute bottom-0 left-0 w-full">
                <div class="text-white container mx-auto tm-container p-8 text-lg flex flex-col md:flex-row justify-between">
                    <span>Copyright 2023. All rights reserved.</span>
                </div>                
            </footer>
        </div>        
    </div>    

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>

        function checkAndShowHideMenu() {
            if(window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');                
            } else {
                $('#tm-nav ul').removeClass('hidden');
            }
        }

        $(function(){
            var tmNav = $('#tm-nav');
            tmNav.singlePageNav();

            checkAndShowHideMenu();
            window.addEventListener('resize', checkAndShowHideMenu);

            $('#menu-toggle').click(function(){
                $('#tm-nav ul').toggleClass('hidden');
            });

            $('#tm-nav ul li').click(function(){
                if(window.innerWidth < 768) {
                    $('#tm-nav ul').addClass('hidden');
                }                
            });

            $(document).scroll(function() {
                var distanceFromTop = $(document).scrollTop();

                if(distanceFromTop > 100) {
                    tmNav.addClass('scroll');
                } else {
                    tmNav.removeClass('scroll');
                }
            });
            
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>