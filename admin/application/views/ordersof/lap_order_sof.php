 <?php
   $this->load->library('fpdf');
  
   $this->fpdf->FPDF("L","cm","A4");
   // kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm 
   $this->fpdf->SetMargins(1,1,1);
   /* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
   */
   $this->fpdf->AliasNbPages();
   // AddPage merupakan fungsi untuk membuat halaman baru
   
  $this->fpdf->AddPage();
  // Setting Font : String Family, String Style, Font size
  $this->fpdf->SetFont('Times','B',12);
  $this->fpdf->Ln();

 $this->fpdf->Cell(30,0.7,'Helpdesk',0,'C','C');

 $this->fpdf->Line(1,3.5,29,3.5);
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 if ($gud == '1'){
	 $this->fpdf->Write(0,'Customer : Semua Customer');
 }else{
 //foreach ($stok as $s){
 $this->fpdf->Write(0,'Order : '.$s->pemesan);
 //}
 }
 $this->fpdf->ln(0.3);
 $this->fpdf->Cell(1,0.3,'Tanggal',1,0,'C');
 $this->fpdf->Cell(1,0.3,'Pemesan',1,0,'C');
 $this->fpdf->Cell(1,0.3,'Company',1,0,'C');
  $this->fpdf->Cell(1,0.3,'Software',1,0,'C');
   $this->fpdf->Cell(1,0.3,'Request',1,0,'C');
    $this->fpdf->Cell(1,0.3,'Ket',1,0,'C');
	$this->fpdf->Cell(1,0.3,'Status',1,0,'C');
 $this->fpdf->Ln();
 $no=0;
 foreach ($orderpro as $s){
	$no++;
 $this->fpdf->Cell(1,0.3,$s->tgl,1,0,'L');
 $this->fpdf->Cell(1,0.3,$s->pemesan,1,0,'L');
 $this->fpdf->Cell(1,0.3,$s->company,1,0,'L');
 $this->fpdf->Cell(1,0.3,$s->nama_software,1,0,'L');
 $this->fpdf->Cell(1,0.3,$s->request,1,0,'L');
  $this->fpdf->Cell(1,0.3,$s->ket,1,0,'L');
   $this->fpdf->Cell(1,0.3,$s->nama_status,1,0,'L');
 $this->fpdf->Ln();
}
   
 $this->fpdf->Output("lap_order_sof.pdf","I");
?>