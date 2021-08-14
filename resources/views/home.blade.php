//@extends('layouts.header')
<html>
<style>
#tt table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 500px;
}

#tt td,#tt th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tt tr:nth-child(even){background-color: #f2f2f2;}

#tt tr:hover {background-color: #ddd;}

#tt th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#tt tbody{
  overflow-y: scroll;
  overflow-x: scroll;
  height: 150px;
  width: 1000px;
}
</style>
<body>
    @if($data)
        <h1  style="margin-left:300px">Train_component information</h1>
        <table id="tt" style="margin-left:300px" >
          <tr>
                <td>Train_id </td>
                <td>Component_id</td>
                <td>Status</td>
                <td>Cost</td>
                <td>Installation_date</td>   
                <td>Manufacture_date</td>
                <td>Next_checkup</td>
                <td>Component_type</td>                
                <td>Menufacturer</td>                
            </tr>
            @foreach($data as $emp)
              <tr>
                <td>{{ $emp->train_id}}</td>
                <td>{{ $emp->component_id}}</td>
                <td>{{ $emp->status }}</td>
                <td>{{ $emp->cost}}</td>
                <td>{{ $emp->installation_date}}</td>
                <td>{{ $emp->manufacture_date }}</td>
                <td>{{ $emp->next_checkup}}</td>
                <td>{{ $emp->component_type}}</td>
                <td>{{ $emp->menufacturer }}</td>                
              </tr>
            @endforeach
        </table>
  @else
    <h5  style="margin-left:300px">You Have No Train_component</h5>
  @endif
</table>
</body>
</html>
//@extends('layouts.footer')

