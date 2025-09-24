@extends('layouts.emoloyee_list_type')

@section('title', 'Staff Directory')

@section('page-title', 'Staff Directory')
{{-- @section('page-subtitle', 'Meet our dedicated teaching staff and faculty members') --}}

@section('teachers-content')
    <div class="teachers-grid">
        <!-- Teacher Card 1 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=1" alt="Dr. Sarah Johnson" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Dr. Sarah Johnson</h3>
                    <div class="teacher-designation">Head of Resistrar</div>
                    <span class="teacher-subject">Registrar</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">August 15, 2015</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">s.johnson@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 123-4567</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Staff ID</div>
                    <div class="detail-value"><span class="teacher-id">SSC-2015-001</span></div>
                </div>
            </div>
        </div>



        

        <!-- Teacher Card 2 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=2" alt="Mr. Robert Chen" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Mr. Robert Chen</h3>
                    <div class="teacher-designation">Senior Examiner</div>
                    <span class="teacher-subject">Exam</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">January 10, 2018</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">r.chen@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 234-5678</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Staff ID</div>
                    <div class="detail-value"><span class="teacher-id">TSC-2018-015</span></div>
                </div>
            </div>
        </div>

        <!-- Teacher Card 3 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=3" alt="Ms. Maria Rodriguez" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Ms. Maria Rodriguez</h3>
                    <div class="teacher-designation">English Literature Teacher</div>
                    <span class="teacher-subject">English</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">March 22, 2020</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">m.rodriguez@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 345-6789</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Teacher ID</div>
                    <div class="detail-value"><span class="teacher-id">TSC-2020-027</span></div>
                </div>
            </div>
        </div>

        <!-- Teacher Card 4 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=4" alt="Dr. James Wilson" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Dr. James Wilson</h3>
                    <div class="teacher-designation">Head of Arts Department</div>
                    <span class="teacher-subject">History</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">September 5, 2012</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">j.wilson@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 456-7890</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Teacher ID</div>
                    <div class="detail-value"><span class="teacher-id">TSC-2012-003</span></div>
                </div>
            </div>
        </div>

        <!-- Teacher Card 5 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=5" alt="Ms. Lisa Thompson" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Ms. Lisa Thompson</h3>
                    <div class="teacher-designation">Chemistry Teacher</div>
                    <span class="teacher-subject">Chemistry</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">July 18, 2019</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">l.thompson@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 567-8901</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Teacher ID</div>
                    <div class="detail-value"><span class="teacher-id">TSC-2019-022</span></div>
                </div>
            </div>
        </div>

        <!-- Teacher Card 6 -->
        <div class="teacher-card">
            <div class="teacher-header">
                <img src="https://i.pravatar.cc/150?img=6" alt="Mr. David Park" class="teacher-image">
                <div class="teacher-basic-info">
                    <h3>Mr. David Park</h3>
                    <div class="teacher-designation">Computer Science Teacher</div>
                    <span class="teacher-subject">Computer Science</span>
                </div>
            </div>
            <div class="teacher-details">
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                    <div class="detail-value">November 3, 2021</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                    <div class="detail-value">d.park@acps.edu</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                    <div class="detail-value">+1 (555) 678-9012</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><i class="fas fa-id-card"></i> Teacher ID</div>
                    <div class="detail-value"><span class="teacher-id">TSC-2021-034</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
