<style>
  table{
    width: 100%;
    border: 0;
  }
</style>
<div style="text-align: center; padding: 40px 0px; background-color: #white;">
  <img alt="logo" src="https://www.georgetownenglish.com/img/logo-header.png" />
</div>
<table>
  <tr>
    <th style="padding: 15px 5px; background-color: #e6e6e6; text-align: left;">Nombre</th>
    <td style="padding: 15px 5px;"> {{ $name }} </td>
  </tr>
  <tr>
    <th style="padding: 15px 5px; background-color: #e6e6e6; text-align: left;">Email</th>
    <td style="padding: 15px 5px;"> {{ $email }} </td>
  </tr>
  <tr>
    <th style="padding: 15px 5px; background-color: #e6e6e6; text-align: left;">Curso de interes</th>
    <td style="padding: 15px 5px;"> {{ $course }} </td>
  </tr>
  <tr>
    <th style="padding: 15px 5px; background-color: #e6e6e6; text-align: left;">Comentario</th>
    <td style="padding: 15px 5px;"> {{ $comment }} </td>
  </tr>
</table>