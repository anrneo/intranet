@php
      //$servername = "192.168.0.6";
      //$password = "1lipCIJVrnD7m10S";
      $username = "root";
      $dbname = "intranet";

      $servername = "localhost";
      $password = "";



      $conn = new mysqli($servername, $username, $password, $dbname);
   mysqli_set_charset($conn,"utf8");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql0 = "SELECT id, cedula, name, email, cargo, sede, cumple FROM users order by name";
     
      $result0 = $conn->query($sql0);
      $arr1=$result0->fetch_all();
@endphp
<style>
  .modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: .3rem;
    outline: 0;
    width: 1202px;
    margin-left: -200px;
}
</style>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Directorio Interno Sumimedical</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table table-hover table-responsive">
                    <div class="input-group" style="margin-bottom:20px">
                        <button class="btn btn-info"><span class="input-group-addon" style="margin-top:8px"><b>Buscar</b></span></button>
                        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el item que deseas buscar..." style="margin-left:20px">
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr  style="background:#25a7cb; color:white">
                                <th class="text-center" style="width:300px; margin-bottom:12px">Id</th>
                                <th class="text-center" style="width:300px; margin-bottom:12px">Cedula</th>
                                <th class="text-center" style="width:300px; margin-bottom:12px">Nombre</th>
                                <th class="text-center" style="width:250px; margin-bottom:12px">Correo</th>
                                <th class="text-center" style="width:400px; margin-bottom:12px">Cargo</th>
                                <th class="text-center" style="width:170px; margin-bottom:12px">sede</th>
                                <th class="text-center" style="width:170px; margin-bottom:12px">cumple</th>
                            </tr>
                        </thead>
                        <tbody class="buscar text-center">
                        @php
                          foreach($arr1 as $row){
                        echo '
                            <tr>
                                <td style="width:300px">'.$row[0].'</td>
                                <td style="width:250px">'.$row[1].'</td>
                                <td style="width:400px">'.$row[2].'</td>
                                <td style="width:170px">'.$row[3].'</td>
                                <td style="width:170px">'.$row[4].'</td>
                                <td style="width:170px">'.$row[5].'</td>
                                <td style="width:170px">'.$row[6].'</td>
                            <tr>';
                            }
                         @endphp
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modalhdresponder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

