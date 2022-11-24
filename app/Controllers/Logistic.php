<?php

namespace App\Controllers;

use Dompdf\Dompdf;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Logistic extends BaseController
{
    public function index()
    {
        if (isset($_GET['submit'])) {
            $bp = $this->request->getGet('bpcode');
            $year = $this->request->getGet('periodyear');
            $month = $this->request->getGet('periodmonth');
            $status = $this->request->getGet('status');

            $data['param'] = [
                'bp' => $bp,
                'year' => $year,
                'month' => $month,
                'status' => $status
            ];

            $getData = file_get_contents("http://10.1.10.101/api-display/public/so-invoice-line/?bp=$bp&year=$year&month=$month&status=$status");
        } else {
            $getData = file_get_contents("http://10.1.10.101/api-display/public/so-invoice-line/?bp=&year=&month=");
        }
        $getCustomer = file_get_contents("http://10.1.10.101/api-display/public/customer-so/");

        $shpData = json_decode($getData);
        $custData = json_decode($getCustomer);
        $data['shipment'] = $shpData->data;
        $data['customer'] = $custData->data;
        return view('report/shipmentlist', $data);
    }

    public function planned_load($wh = null)
    {
        //$warehouse = $wh;

        $warehouse = $wh != '' ? $wh : '';

        $getData = file_get_contents("http://10.1.10.101/api-display/public/get-planned-load/?warehouse=$warehouse");
        $plData = json_decode($getData);
        $data['plannedload'] = $plData->data;
        $data['wh'] = $warehouse;

        $from = date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d'))));
        $to = date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d'))));
        $getData2 = file_get_contents("http://10.1.10.101/api-display/public/shipment-data/?datefrom=$from&dateto=$to");
        $shp = json_decode($getData2);
        $data['shipment'] = $shp->data;
        return view('report/planned-load', $data);
    }

    public function print_shipment($shipment)
    {
        return view('report/shppdf');
        //$pdf = new Dompdf();
        //$content = file_get_contents(view('transaction/invpdf', $data));
        //$pdf->loadHtml(view('transaction/invpdf', $data));
        //$pdf->setPaper('A4','Potrait');
        //$pdf->render();

        //$pdf->stream($filename,array("Attachment"=>0));
    }

    public function shipment_graph()
    {

        $getGraph = file_get_contents("http://localhost/slim-rest/public/shipment-graph/");

        $grp = json_decode($getGraph);
        $data['date'] = $grp->date;
        $data['dtApproved'] = $grp->approved;
        $data['dtReleased'] = $grp->released;
        $data['dtInvoiced'] = $grp->invoiced;
        $data['dtTotal'] = $grp->total;

        return view('report/shp_graph', $data);
    }

    public function shipment_graph_export()
    {
        $getGraph = file_get_contents("http://localhost/slim-rest/public/shipment-graph/");

        $grp = json_decode($getGraph);
        $date = $grp->date;
        $dtApr = $grp->approved;
        $dtRls = $grp->released;
        $dtInv = $grp->invoiced;
        $dtTotal = $grp->total;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(0);

        $sheet->setCellValue('A1', 'No')
        ->setCellValue('B1', 'Tanggal')
        ->setCellValue('C1', 'Total Shipment Approved')
        ->setCellValue('D1', 'Total Shipment Released')
        ->setCellValue('E1', 'Total Shipment Invoiced')
        ->setCellValue('F1', 'Total Shipment');

        $colNum = 2;
        $no = 1;
        $i = 0;
        foreach ($date as $d) {
            $sheet->setCellValue('A' . $colNum, $no);
            $sheet->setCellValue('B' . $colNum, $d);
            $sheet->setCellValue('C' . $colNum, $dtApr[$i]);
            $sheet->setCellValue('D' . $colNum, $dtRls[$i]);
            $sheet->setCellValue('E' . $colNum, $dtInv[$i]);
            $sheet->setCellValue('F' . $colNum, $dtTotal[$i]);
            $colNum++;
            $no++;
            $i++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = date('Y-m-d H:i:s').'_data_summary_shipment';

        // Redirect hasil generate xlsx ke web client
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
