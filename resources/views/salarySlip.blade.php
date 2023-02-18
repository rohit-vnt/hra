<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
                font-size: 10px;
                font-family: sans-serif;          
            }
        </style>
    </head>
    <body>
        <table id="contnet">
            <tr>
                <td colspan="14" style="text-align: center;">PAYSLIP FOR THE MONTH OF JAN 2023</td>
            </tr>
            <tr>
                <td colspan="8">EMP NO :</td>
                <td colspan="6">DAYS WORKED :</td>
            </tr>
            <tr>
                <td colspan="8">NAME :</td>
                <td colspan="6">EMP DOJ :</td>
            </tr>
            <tr>
                <td colspan="8">GENDER :</td>
            </tr>
            <tr>
                <td colspan="8">GRADE :</td>
            </tr>
            <tr>
                <td colspan="8">DESG CD:</td>
                <td colspan="6">EMP PAN :</td>
            </tr>
            <tr>
                <td colspan="8">DEPARTMENT:</td>
                <td colspan="6">ESIC NO :</td>
            </tr>
            <tr>
                <td colspan="8">LOCATION:</td>
                <td colspan="6">UAN :</td>
            </tr>
            <tr>
                <td colspan="8">BANK NAME:</td>
                <td colspan="6">BANK A/C :</td>
            </tr>   
            <tr>
                <td colspan="2">EARNING</td>
                <td colspan="2">RATE</td>
                <td colspan="2">CURRENT MONTH</td>
                <td colspan="2">ARREAR (+/-)</td>
                <td colspan="2">GROSS</td>
                <td colspan="2">DEDUCTIONS</td>
                <td colspan="2">CURRENT MONTH</td>
            </tr>
            <tr>
                <td colspan="2">BASIC</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">PROVIDENT FUND DEDUCTOIN</td>
                <td colspan="2">XXX.00</td>
            </tr>
            <tr>
                <td colspan="2">HRA</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">PROFESSION TAX</td>
                <td colspan="2">XXX.00</td>
            </tr>
            <tr>
                <td colspan="2">CITY COMPENSATORY ALLOWAN</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">ESIC</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">SHIFT ALLOWANCE</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">ADV. AGAINST STAT BONUS</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">SKILL ALLOWANCE</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">LEAVE ENCASHMENT</td>
                <td colspan="2"></td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">GROSS ENCASHMENT</td>
                <td colspan="2"></td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">TOTAL DEDUCTION</td>
                <td colspan="2">XXXX.00</td>
            </tr>
            <tr>
                <td colspan="14">NET PAY : 50000</td>
            </tr>
            <tr>
                <td colspan="14">NET PAY IN WORDS : FIFTY THOUSAND ONLY</td>
            </tr>
            <tr>
                <td colspan="14" style="text-align: center;">*This is a computer generated pay slip and does not require signature.</td>
            </tr>
        </table>
    </body>
    <script>
    function download(){
        window.jsPDF = window.jspdf.jsPDF;
        var doc = new jsPDF();
        // Source HTMLElement or a string containing HTML.
        var elementHTML = document.querySelector("#contnet");
        doc.html(elementHTML, {
            callback: function(doc) {
                // Save the PDF
                doc.save('sample-document.pdf');
            },
            x: 15,
            y: 15,
            width: 170, //target width in the PDF document
            windowWidth: 650 //window width in CSS pixels
        });
    }
    </script>
</html>