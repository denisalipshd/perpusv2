@extends('layouts.petugas')

@section('title', 'Dashboard')

@section('content')

<div class="content">
        <div class="cards-dashboard">
          <div class="card-dashboard">
            <h4>Total Users</h4>
            <p>1,245</p>
          </div>

          <div class="card-dashboard">
            <h4>Total Orders</h4>
            <p>856</p>
          </div>

          <div class="card-dashboard">
            <h4>Revenue</h4>
            <p>$12,540</p>
          </div>

          <div class="card-dashboard">
            <h4>Products</h4>
            <p>230</p>
          </div>
        </div>

        <div class="table-section">
          <h3>Recent Orders</h3>
          <table>
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#001</td>
                <td>Denis</td>
                <td><span class="status success">Completed</span></td>
                <td>15 Feb 2026</td>
              </tr>
              <tr>
                <td>#002</td>
                <td>Andi</td>
                <td><span class="status pending">Pending</span></td>
                <td>14 Feb 2026</td>
              </tr>
              <tr>
                <td>#003</td>
                <td>Budi</td>
                <td><span class="status failed">Failed</span></td>
                <td>13 Feb 2026</td>
              </tr>
            </tbody>
          </table>
        </div>
</div>

@endsection
