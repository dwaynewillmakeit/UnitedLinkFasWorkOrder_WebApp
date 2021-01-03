<!DOCTYPE html>
<html>
<head>
    <title>WorkOrder PDF</title>
    <style>



        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #999;
            padding: 0.5rem;
            text-align: left;
            font-size: 12px;

        }
    </style>
</head>
<body>

    <table >

        <tr >
            <td style=" border: 0px solid #999;">
                <img src="{{public_path('image'.DIRECTORY_SEPARATOR.'logo.png')}}" width="20%">
            </td>
            <td style=" border: 0px solid #999; vertical-align: text-top;">
                <h2> UNITED LINK </h2>
                <h3> FIRE & SECURITY LTD. </h3>
                <h3> 647-783-3485 </h3>
                <h3> 647-702-3485</h3>
            </td>
            <td style=" border: 0px solid #999; vertical-align: text-top; text-align:center;">
                SERVICE WORK ORDER <br><br>
                {{$workorder->id}}
            </td>
        </tr>

    </table>
    <br>
    <br>
<table border="1"  style="width: 100%">
    <tr>
        <td colspan="4" style="text-align: center; padding:0px"><h3>{{$workorder->client->name}}</h3></td>
    </tr>
    <tr>
        <td colspan="2" >
            <b>ISSUE/SCHEDULE DATE</b>
            <br>
            <br>
            {{date('D M d, Y',strtotime($workorder->issue_date))}}
        </td>
        <td colspan="2">
            <b>P.O. #</b>
            <br>
            <br>
            {{$workorder->po_number}}
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <b>CUSTOMER BILLING ADDRESS</b>
            <br>
            <br>
            {{$workorder->billingAddress->street.", ".$workorder->billingAddress->city.", ".$workorder->billingAddress->state.", ".$workorder->billingAddress->zipcode}}
        </td>
        <td colspan="2">
            <b>SITE ADDRESS</b>
            <br>
            <br>
            {{$workorder->siteAddress->street.", ".$workorder->siteAddress->city.", ".$workorder->siteAddress->state.", ".$workorder->siteAddress->zipcode}}
        </td>
    </tr>
    <tr>
        <td ><b>REQUESTED BY:</b> <br><br>{{$workorder->requested_by}}</td>
        <td style="vertical-align: text-top;"><b>TEL:</b> {{$workorder->requested_by_tel}}</td>
        <td style="vertical-align: text-top;"><b>TEL:</b> {{$workorder->person_to_see_tel}}</td>
        <td ><b>PERSON TO SEE:</b> <br><br>  {{$workorder->person_to_see}}</td>
    </tr>
    <tr>
        <td colspan="4"><b>SERVICE TYPE:</b> @php echo str_repeat("&nbsp;",8);  @endphp {{$workorder->service_type}} </td>
    </tr>





</table>
<br>
<table border="1" style="width: 100%">
    <tr>
        <th colspan="4">WORK REQUIRED</th>
    </tr>

    <tr>
        <td colspan="4">{{$workorder->work_required}}</td>
    </tr>
</table>
<br>
<table border="1" style="width: 100%">
    <tr>
        <td colspan="4"><b>WORK COMPLETED:</b> {{$workorder->work_completed? "YES":"NO"}}</td>
    </tr>
    <tr>
        <td colspan="4">{{$workorder->work_details}}</td>
    </tr>
</table>


<br>
@if ($workorder->materials->isNotEmpty())
    <table border="1" style="width: 100%">
        <tr>
            <th >Qty</th>
            <th >PART NO.</th>
            <th >Material</th>
        </tr>
        @foreach ($workorder->materials as $material)
        <tr>
            <td>{{$material->quantity}}</td>
            <td>{{$material->part_number}}</td>
            <td>{{$material->material_description}}</td>

        </tr>
        @endforeach
    </table>

@endif



<br><br>
<table style="width: 100%;">
    <tr>
      <td style=" border: 0px solid #999;">
        <img src="{{storage_path().DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."signatures".DIRECTORY_SEPARATOR."site-rep".$workorder->id.".jpg"}}" width="200px"/>
      </td>
      <td style=" border: 0px solid #999; text-align:center;">
        <img src="{{storage_path().DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."signatures".DIRECTORY_SEPARATOR."tech-rep".$workorder->id.".jpg"}}" width="200px"/>

      </td>
    </tr>
    <tr>
      <td style=" border: 0px solid #999; ">
        SITE REP SIGNATURE
      </td>
      <td style=" border: 0px solid #999; text-align:center;">
       TECHNICIAN SIGNATURE
      </td>
    </tr>

</table>



</body>
</html>
