

       @guest
                          
    
       @else
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="" target="_blank" class="brand-link">
     <img src="{{asset('Store_Erp/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
     <span class="brand-text font-weight-light">Store ERP</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
       @if( Auth::user()->profileimage!='')
         <img  src="{{url('books/profile/',Auth::user()->profileimage)}}" class="img-circle elevation-2" alt="User Image">
        @else
         <img src="{{asset('Store_Erp/img/user2.png')}}" class="img-circle elevation-2" alt="User Image">
    @endif
       
       </div>
       <div class="info">
         <a class="d-block">    <?php echo Auth::user()->name;
          ?></a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              @if(Auth::user()->admin)
         <li class="nav-item has-treeview">
           <a href="{{ route('dashboard') }}" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         @else
          <li class="nav-item has-treeview">
           <a href="{{ route('admin_home') }}" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               My Dashboard
             </p>
           </a>
         </li> 
         @endif   
         @if(Auth::user()->admin)
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list-alt"></i>
             <p>
               Category
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('category.create')}}"class="nav-link">
                 <p>Add Category</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('category.index')}}" class="nav-link">
                 <p>All Categories</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-paper-plane"></i>
             <p>
               Requests
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="{{route('order.create')}}"  class="nav-link">
                <p>
                New Request
                  
                </p>
              </a>
             </li>

             <li class="nav-item">
               <a href="{{route('order.myRequests')}}"class="nav-link">
                 <p>My Requests</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('order.index')}}" class="nav-link">
                 <p>All Requests</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-cubes"></i>
             <p>
               Assets
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="{{route('asset.create')}}"  class="nav-link">
                <p>
                Add New Asset
                  
                </p>
              </a>
             </li>

             <li class="nav-item">
               <a href="{{route('asset.index')}}" class="nav-link">
                 <p>All Assets</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-trash"></i>
             <p>
               Trashes
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="{{route('category.showTrash')}}"  class="nav-link">
                <p>
                  Category Trash                  
                </p>
              </a>
             </li>

             <li class="nav-item">
               <a href="{{route('asset.showTrash')}}" class="nav-link">
                 <p>Asset Trash</p>
               </a>
             </li>
           </ul>
         </li>
         @else

         <li class="nav-item has-treeview">
           <a href="{{route('order.myRequests')}}"  class="nav-link">
             <i class="nav-icon fas fa-paper-plane"></i>
             <p>
             My Requests
              
             </p>
           </a>
         </li>

         <li class="nav-item has-treeview">
           <a href=""  class="nav-link">
             <i class="nav-icon fas fa-question"></i>
             <p>
             New Request
              
             </p>
           </a>
         </li>

        
         @endif

         @if(Auth::user()->admin)
         <li class="nav-item has-treeview">
           <a href="{{ route('users') }}"  class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
             Users
             </p>
           </a>
         </li> 

         <li class="nav-item has-treeview">
           <a href="{{ route('log.index') }}"  class="nav-link">
             <i class="nav-icon fas fa-history"></i>
             <p>
             System Log
              
             </p>
           </a>
         </li>
              @endif
         <li class="nav-item has-treeview">
           <a href="{{ route('user.profile') }}"  class="nav-link">
             <i class="nav-icon fas fa-user"></i>
             <p>
             Profile
              
             </p>
           </a>
         </li>

     
    
         <li class="nav-item has-treeview">
          <a  class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{-- {{ __('Logout') }} --}}
              <i class="nav-icon fas fa-power-off"></i>
           <p>
          Logout
           </p>
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

         </li>
        
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>      
 @endguest