<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="{{env('APP_ROOT')}}" class="nav-link">Home</a>
         </li> -->
         <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
         </li> -->
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
         </div>
      </li> -->

      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
            <img class="header-icon" src="{{env('APP_ROOT')}}assets/images/icons/Cart.png" width="30" height="30"  alt="Cart">
            <?php 
               $boxesCount = 0;
               $boxes = session('boxes');
               $box = session('box');
               $boxesCount = isset($boxes) ? count($boxes) : 0;

               if($box){
                  foreach ($box->bunches as $key => $bunch) {
                     $bunch->normalizedName = strlen($bunch->VarietyName) > 10 ? substr($bunch->VarietyName, 0, 10) .'...' : $bunch->normalizedName;
                 }
               }
            ?>
            <span class="badge badge-warning navbar-badge">{{$boxesCount}}</span>
         </a>
         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-left">
            @if(isset($boxes) || isset($box))
               <strong class="cart-header">Your Cart</strong>
            @else
               <h6 class="cart-header">Cart is empty</h6>
            @endif

            <div class="dropdown-divider"></div>
            <table class="table table-hover text-nowrap">
               @if(isset($boxes) || isset($box))
                  <thead>
                     <tr>
                        <th>Variety</th>
                        <th>Bunches</th>
                        <th>Cost</th>
                        <th></th>
                     </tr>
                  </thead>
               @endif

               @if(isset($box))
                  <tbody>
                     <tr><th colspan="4">Current Box</th></tr>
                  </tbody>

                  <tbody>
                     @foreach ($box->bunches as $index => $bunch)
                        <tr>
                              <td>{{ $bunch->normalizedName }}</td>
                              <td>{{ $bunch->quantity }}</td>
                              <td>{{ $bunch->cost }}</td>
                              <td><a href="{{env('APP_ROOT')}}remove-bunch/{{$index}}"><i class="fas fa-trash"></i></a></td>
                        </tr>
                     @endforeach
                  </tbody>
               @endif

               @if(isset($boxes))
                  <tbody>
                     <tr><th colspan="4">Full Box(es)</th></tr>
                  </tbody>
                  
                  @foreach ($boxes as $index => $box)
                     <tbody>
                        <tr><td colspan="4" class="text-center"><b>Box {{++$index}}</b></td></tr>
                        @foreach ($box->bunches as $bunch_index => $bunch)
                           <tr>
                                 <td>{{ $bunch->normalizedName }}</td>
                                 <td>{{ $bunch->quantity }}</td>
                                 <td>{{ $bunch->cost }}</td>
                                 <td></td>
                           </tr>
                        @endforeach
                     </tbody>
                  @endforeach
               @endif
               
            </table>
            @if(isset($boxes))
               <div class="dropdown-divider"></div>

               <!-- <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> -->
               <div class="dropdown-item dropdown-footer row">
                  <div class="col-sm-6">

                  </div>
                  <div class="col-sm-6">
                     <a href="{{env('APP_ROOT')}}checkout" class="btn btn-xs btn-checkout">CHECKOUT</a>
                  </div>
               </div>
            @endif
         </div>
      </li>

      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #b55068;">
            <img class="header-icon" src="{{env('APP_ROOT')}}assets/images/icons/profile.png" alt="Profile">
         </a>
         <div class="dropdown-menu dropdown-menu-right">
            <a href="{{env('APP_ROOT')}}logout" class="dropdown-item">Logout</a>
            <!-- <div class="dropdown-divider"></div> -->
         </div>
      </li>

      <!-- <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li> -->
   </ul>
</nav>