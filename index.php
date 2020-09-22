<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>

</head>
<body>

    <h1>
        TEST_JQ
    </h1>
    
    <form action="send_here.php" method="POST">
        <table>
            <tr>
                <th>digit</th>
                <th>multiplier</th>
                <th>subtotal</th>
            </tr>
            
            <?php for($i = 0; $i < 5; $i++): ?>
            <tr>
                <td>
                    <select name="select" class="digit" id="digit<?=$i?>">
                    <option selected value="1">one</option>
                    <option value="2">two</option>
                    <option value="3">three</option>
                    <option value="4">four</option>
                    <option value="5">five</option>
                    </select>
                </td>

                <td>
                    <input type="number" class="multiplier" id="multiplier<?=$i?>" value="1">
                </td>

                <td>
                    <input type="text" readonly id="subtotal<?=$i?>">
                </td>
            </tr>
            <?php endfor; ?>
        </table>

        <br>total : <input placeholder="total" id="total" name="total" readonly>

        <input type="submit" id="sendTotal" value="Send value to next page">
    </form>

    <script>

        var total = 0;
        var tmp = 0;
        iterate = $(".digit").length;
        console.log("banyak kolom=" + iterate);

        //initial value
        for(x = 0; x<iterate; x++)
        {
            tmp_digit = parseInt($("#digit"+x).children("option:selected").val());
            tmp_mul = parseInt($("#multiplier"+x).val());
            tmp = tmp_digit * tmp_mul;
            $("#subtotal"+x).val(tmp);
            total = total + tmp;
        }
        //set the total field to initial value
        $("#total").val(total);


        //monitor every element of class digit and multiplier, if changed, run algorithm
        $(".digit, .multiplier").change(function()
        {
            total = 0;  //initial value and reset value to 0 for every trigger
            for(x = 0; x<iterate; x++) //iterate for every row present
            {
                tmp_digit = parseInt($("#digit"+x).children("option:selected").val()); //
                tmp_mul = parseInt($("#multiplier"+x).val());
                tmp = tmp_digit * tmp_mul;
                $("#subtotal"+x).val(tmp);
                total = total + tmp;
            }
            $("#total").val(total);
        });
        
    </script>

</body>
</html>