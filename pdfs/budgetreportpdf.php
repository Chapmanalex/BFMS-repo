

<?php
require('fpdf.php');
$hostname = "localhost";
$username1 = "root";
$password = "";
$dbname = "ems_db";

$con = mysqli_connect($hostname,$username1,$password,$dbname) OR die('failed to connect to the database');

class myPDF extends FPDF
{
  function Header()
  {
    // Logo
    $this->Image('../img/expense-management-application-software-icon-png-favpng-GdmeLE6k75udAk1CUMh6TAuWC.jpg', 10, 6, 30);
    // Arial bold 15
    $this->SetFont('Arial', 'B', 15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30, 10, 'My PDF Document', 0, 0, 'C');
    // Line break
    $this->Ln(20);
  }

  function Table($header, $data)
  {
    // $header = array('Name', 'Age', 'Job');
    // $data = array(array('John Doe', 30, 'Software Engineer'), array('Jane Doe', 25, 'Doctor'));

    // Set the column widths
    $w = array(20, 30, 40);

    // Header
    for ($i = 0; $i < count($header); $i++)
    {
      $this->SetFont('Arial', 'B', 10);
      $this->Cell($w[$i], 7, $header[$i], 0, 0, 'C');
    }
    $this->Ln();

    // Data
    $this->SetFont('Arial', '', 10);
    for ($i = 0; $i < count($data); $i++)
    {
      for ($j = 0; $j < count($data[0]); $j++)
      {
        $this->Cell($w[$j], 7, $data[$i][$j], 0, 0, 'C');
      }
      $this->Ln();
    }
  }

}

$sql = mysqli_query($con, "SELECT i.expenseID,  s.budget_amount AS amount, s.budgetname, SUM(i.E_amount) AS amount_spent, s.startdate , s.enddate , DATEDIFF(s.enddate, NOW()) AS remaining_days
           					FROM expenses i, budgets s  WHERE i.budgetID = s.budgetID group by s.budgetID");
       $r= mysqli_fetch_array($sql);


$pdf = new myPDF();
$pdf->AddPage();

$header = array('BudgetName', 'description', 'Set amount',);
while ($row = mysqli_fetch_array($sql))
{
	$data = array(array($r['budgetname'], 30, $r['amount']));
}
 // array('Jane Doe', 25, 'Doctor'));

$pdf->Table($header, $data);

$pdf->Output();
?>