@extends('layouts.adminLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')
    <section id="admin-section" class="wrapper">


        <h2 class="admin-option-title">Options</h2>
        <div class="admin-option-container" >
            <div class="admin-option"  style="background-color:  var(--bg-button-hover)">
                <a href="{{route('home')}}"></a>
                <div class="option-name-container">
                    <p>Return to Readily</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/web.svg" alt="database icon" />
                </div>
            </div>
            <div class="admin-option" style="background-color:  var(--bg-button-hover)">
                <a href="#" onclick="toggleTheme()"></a>
                <div class="option-name-container">
                    <p>Dark/Light theme</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/theme.svg" alt="database icon" />
                </div>
            </div>

        </div>


        <h2 class="admin-option-title">Tables</h2>
        <div class="admin-option-container">
            <div class="admin-option">
                <a href="{{route('users.index')}}"></a>
                <div class="option-name-container">
                    <p>Users</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/database.svg" alt="database icon" />
                </div>
            </div>
            <div class="admin-option">
                <a href="index.php?page=admin-categories"></a>
                <div class="option-name-container">
                    <p>Categories</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/database.svg" alt="database icon" />
                </div>
            </div>
            <div class="admin-option">
                <a href="index.php?page=admin-publishers"></a>
                <div class="option-name-container">
                    <p>Publishers</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/database.svg" alt="database icon" />
                </div>
            </div>
            <div class="admin-option">
                <a href="index.php?page=admin-delivery-options"></a>
                <div class="option-name-container">
                    <p>Delivery Options</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/database.svg" alt="database icon" />
                </div>
            </div>
        </div>

        <h2 class="admin-option-title">Surveys</h2>
        <div class="admin-option-container">

            <div class="admin-option">
                <a href="index.php?page=admin-survey"></a>
                <div class="option-name-container">
                    <p>Survey Result</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/survey.svg" alt="survey icon" />
                </div>
            </div>
        </div>


        <h2 class="admin-option-title">Messages</h2>
        <div class="admin-option-container">

            <div class="admin-option">
                <a href="index.php?page=admin-messages"></a>
                <div class="option-name-container">
                    <p>User Messages</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/message.svg" alt="message icon" />
                </div>
            </div>
        </div>


        <h2 class="admin-option-title">Statistics</h2>
        <div class="admin-option-container">
            <div class="admin-option">
                <a href="index.php?page=admin-orders"></a>
                <div class="option-name-container">
                    <p>Orders</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/stats.svg" alt="stats icon" />
                </div>
            </div>

            <div class="admin-option">
                <a href="index.php?page=admin-visitors"></a>
                <div class="option-name-container">
                    <p>Visitors</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/stats.svg" alt="stats icon" />
                </div>
            </div>

            <div class="admin-option">
                <a href="index.php?page=admin-logged-id-users"></a>
                <div class="option-name-container">
                    <p>Logged-in Users</p>
                </div>
                <div class="option-icon-container">
                    <img src="{{asset('assets/images/admin')}}/stats.svg" alt="stats icon" />
                </div>
            </div>

        </div>
    </section>
@endsection
