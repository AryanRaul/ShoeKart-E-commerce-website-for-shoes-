
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>

        <div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                                <h1> ShoeKart</h1>
                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3>Invoice</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">Date</span>: 05/12/2020</p>
                            </div>
                            <div class = "invoice-head-middle-right text-end">
                                <p><spanf class = "text-bold">Invoice No:</span>16789</p>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                                <ul>
                                    <li class = 'text-bold'>Invoiced To:</li>
                                    <li></li>
                                    <li>15 Hodges Mews, High Wycombe</li>
                                    <li>HP12 3JL</li>
                                    <li>United Kingdom</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class = "overflow-view">
                        <div class = "invoice -body">
                            <table>
                                <thead>
                                    <tr style = "width = 20px">
                                    <td class = "text-bold">Product ID</td>
                                    <td class = "text-bold">Brand Name</td>
                                    <td class = "text-bold">Product Name</td>
                                        <td class = "text-bold">Amount</td>
                                    </tr>
                                </thead>

                                
<?php
    $db = mysqli_connect('localhost', 'root', '', 'project');
      $select_query="Select C.product_id,P.brand,P.product_title,
      P.price from cart_details C,products P where P.product_id=C.product_id";
      $result_query=mysqli_query($db,$select_query);
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['product_title'];
      while($row=mysqli_fetch_assoc($result_query))
      {
      
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $price=$row['price'];
        $brand=$row['brand'];
        //$price = array(['price']); 
        //$product_values=array_sum($price); // [500]
        //$total_price+=$product_values; 

                               echo" <tbody>
                                    <tr>
                                    <td>$product_id</td>
                                    <td>$brand</td>
                                    <td>$product_title</td>
                                    <td class = 'text-end'>$price</td>
                                    </tr>
                                    ";}?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'project');
                            $select_query_t="Select C.product_id, sum(P.price) from cart_details C,products P where P.product_id=C.product_id";
                            $result_query_t=mysqli_query($db,$select_query_t);
                                  $row=mysqli_fetch_assoc($result_query_t);
                        $total_price=$row['sum(P.price)'];
                           echo" <div class = 'invoice-body-bottom'>
                                <div class = 'invoice-body-info-item border-bottom'>
                                    <div class = 'info-item-td text-end text-bold'>Sub Total:</div>
                                    <div class = 'info-item-td text-end'>$total_price</div>
                                </div>
                                </div>
                    </div>";?>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                        <div class = "invoice-btns">
                            <button type = "button" class = "invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                            <button type = "button" class = "invoice-btn">
                                <span>
                                    <i class="fa-solid fa-download"></i>
                                </span>
                                <span>Download</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src = "script.js"></script>
    </body>
</html>