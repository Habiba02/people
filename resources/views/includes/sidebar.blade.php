<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-files-o"></i> <span>Uploads</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!!route('otluploadform')!!}"><i class="fa fa-circle-o"></i> OTL</a></li>
                    <li><a href="{!!route('stepuploadform')!!}"><i class="fa fa-circle-o"></i> STEP</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!!route('employee')!!}"><i class="fa fa-circle-o"></i> Employee</a></li>
                    <li><a href="{!!route('employeeactivity')!!}"><i class="fa fa-circle-o"></i> Employee activity</a></li>
                    <li><a href="{!!route('employeeskill')!!}"><i class="fa fa-circle-o"></i> Employee skill</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>