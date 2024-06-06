@extends('user.layouts.main')
@section('body')
<div class="main_section">
    @include('user.layouts.sidenav')
<div class="content-area">
    <div class="mobilebar">
      <div class="logo sml">iX</div>
      <div class="mbh">
      <button class="mnubtn" onclick="slideMenu()"><i class="fa fa-bars" aria-hidden="true"></i></button>
      </div>
    </div>
    <div class="page-title">Inventory</div>
    <div class="page-desc">View and manage your stock</div>
    <div class="tableclass">

        <table>
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Item Stock</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="t_row">
                <td>Ball</td>
                <td>volley ball</td>
                <td>$19.99 ea</td>
                <td>18 In Stock</td>
                <td>
                  <a class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <a class="btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr class="t_row">
                <td>Ball</td>
                <td>volley ball</td>
                <td>$19.99 ea</td>
                <td>18 In Stock</td>
                <td>
                  <a class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <a class="btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
              </tr>
              <!-- Repeat for other items -->
            </tbody>
          </table>
    </div>
  
  </div>
</div>
@endsection