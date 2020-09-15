<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title>Ismailov Kutunai | Lab1 Web</title>
        <link rel="stylesheet" href="style.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
        <style>
            html, body, h1 {
    margin: 0px;
    padding: 0px;
}

#container {
    text-align: center;
    background-image: linear-gradient(rgb(72, 0, 120), gray);
    height: 100%;
    width: 100%;
    
    padding-bottom: 45px;
}
#header {
    color: white;
    font-family: 'serif';
}



h4 {
    color: red;
}

h4 {
    color: white;
    font-family: serif;
}

#TZ {
    text-align: center;
    margin-top: 40px;
    margin-bottom: 20px;
    border-radius: 10px;
}
#param {
    text-align: inherit;
}
select, input {
    border-radius: 5px;
    border: 1px;
}
#header a {
    color: gray;
    margin-left: 20px;
}

input[data-rule].valid {
    border: 1px solid green;
}
.invalid {
    border: 1px solid red;
}
#res {
    border: 1px solid black;
    width: 100%;
    margin-top: 30px;

} 
/* границы ячеек первого ряда таблицы */
#res th {border: 1px solid black;}
/* границы ячеек тела таблицы */
#res td {border: 1px solid black;}




        </style
        <table id="container">
            <tr id="header">
                <td>
                    
                            <h1>Ismailov Kutunai P3213</h1>
                    
                </td>
                <td>
                   
                    <h2>Lab #1 Web V: 213006     <a href="./tz.html">Тех.зад.</a></h2> 
                    
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    
                        <img src="./areas.png" alt="TehZadanie" id="TZ">


                        <style>
                            input[data-rule].valid {
                            border: 1px solid green;
                            }
                            .invalid {
                            border: 1px solid red;
                            }

                            =
                        </style>
                    
                    
                        <!-- <form name="test" method="get" action="check.php" id="param"> -->
                        <h4>
                            X cord:
                                <select name="x" class="x" id="x" required >
                                    <option ></option>
                                    <option value="-5">-5</option>
                                    <option value="-4">-4</option>
                                    <option value="-3">-3</option>
                                    <option value="-2">-2</option>
                                    <option value="-1">-1</option>
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <br><br>
                        </h4>
                        <h4>
                                Y cord:
                                <input type="text" class="y" list="list" maxlength="4" name="y" id="y" pattern="(-)*[0-5]{1}(.)*" placeholder="Введите координату Y" required data-rule="num">
                                <datalist id="list">
                                <option value="-3">-3</option>
                                    <option value="-2">-2</option>
                                    <option value="-1">-1</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </datalist>

                                <br><br>
                                
                        </h4>
                        <h4>
                            R value:
                            <select name="r" class="r" id="r" required >
                                <option ></option>
                                <option value="1" selected>1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                            </select>
                                <br><br>
                        </h4>
                        <input type="submit" value="Отправить" class="otpravka">
                        <!-- </form> -->
                        
                        <script>
                            let inputs = document.querySelectorAll('input[data-rule]');
                            let button = document.querySelectorAll(".button");

                            for (let input of inputs) {
                                input.addEventListener('blur', function() {
                                    let rule = this.dataset.rule;
                                    let value = this.value;

                                    this.classList.remove('invalid');
                                    this.classList.remove('valid');
                                    if (value < -3 || value > 5 || value.replace(/\s/g, '').length === 0 || isNaN(value)){
                                        this.classList.add('invalid');
                                        button.forEach(el => {
                                            el.disabled = true;
                                        });
                                    }
                                    else {
                                        this.classList.add('valid');
                                        button.forEach(el => {
                                            el.disabled = false;
                                        });
                                    }
                                }); 
                            }
                        </script>
                        <script>
                            $(document).ready(function() {
                                $('input.otpravka').on('click', function() {
                                    var xValue = $('select.x').val();
                                    var yValue = $('input.y').val();
                                    var rValue = $('select.r').val();
                                    // alert(xValue + yValue + rValue);
                                    $.ajax({
                                        method: "GET",
                                        url: "check.php",
                                        data: { x: xValue, y: yValue, r: rValue }
                                        })
                                        .done(function( msg ) {
                                            // alert( "Data Saved: " + msg );
                                            $("#res").html(msg);
                                            
                                    });
                                })
                            });
                        </script>

                        <table id="res">
                            
                        </table>


                        
                    
                    
                 </td> 
            </tr>
       </table>
    </body>
    </html>
