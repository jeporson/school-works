<?php

$grossSalary = 0.0;
$tax = 0;
$deduction = 0.00;
$netSalary = 0.00;

if (isset($_POST["computesalary"])) {
    
    $numberOfDays = $_POST["numberofdays"];
    $employeesStatus = $_POST["employeestatus"];
    $civilStatus = $_POST["civilstatus"];

    if ($employeesStatus == "Regular") {
        $grossSalary = 500 * (int) $numberOfDays;
    } 
    elseif ($employeesStatus == "Probationary") {
        $grossSalary = 400 * (int) $numberOfDays;
    } 
    elseif ($employeesStatus == "Casual") {
        $grossSalary = 300 * (int) $numberOfDays;
    }

    if ($civilStatus == "Single") {
        $tax = 12;
    } 
    if ($civilStatus == "Married") {
        $tax = 10;
    }
    if ($civilStatus == "Widow") {
        $tax = 7;
    }

    echo $tax;
    $deduction = ($grossSalary * $tax) / 100;
    $netSalary = ($grossSalary - deduction);
}

?>

<form action="" method="post">
    <table align="center">
        <tr>
            <td>No. of Days Worked <input type="text" name="numberofdays" />
            </td>
        </tr>
        <tr>
            <td>Employee status <select name="employeestatus" id="employeestatus">
                <option value="--Select employee status--">--Select employee status--</option>
                <option value="Regular">Regular</option>
                <option value="Probationary">Probationary</option>
                <option value="Casual">Casual</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Civile status <select name="civilstatus" id="civilstatus">
                <option value="--Select civil status">--Select civil status--</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widow">Widow</option>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Compute Salary" name="computesalary" />
            </td>
        </tr>
    </table>
</form>

<?php 

echo "<p style='margin-left:520px;'>Gross Salary:" .number_format($grossSalary, 2) ." </p>
echo "<p style='margin-left:520px;'>Tax: $tax%</p>";
echo "<p style='margin-left:520px;'>Deduction:" .number_format($deduction, 2) ."</p>";
echo "<p style='margin-left:520px;'>Net Salary:" .number_format($netSalary,2) ."</p>";
?>




