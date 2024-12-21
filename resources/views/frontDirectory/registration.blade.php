@extends('frontDirectory.layouts.master')
@section('title', 'Contact Us')
@section('main_content')
    <?php
    $toBkash= ['Dr. X '=>'0171*****', 'Dr. Y'=>'01717'  ];
    $request=$_GET['update']??'yes';
    if($request=='yes'){
        ?>
    <div class="container-fluid py-5">
        <div class="container">
            <!--        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Registration</h5>-->
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="clearfix"></div>
                        <div class="col-sm-6">
                            <h4>রেজিষ্ট্রেশন এর ধাপ সমূহ</h4>
                            <ul id="registration_note">

                                <li>ধাপ-১:  বিকাশের মাধ্যমে উল্লেখিত যে কোন একটি বিকাশ নাম্বারে  ০০/-( টাকা) <span style="color:red;font-weight:bold"> ( বিকাশের সেন্ড মানি অপশানের মাধ্যমে)</span> প্রেরণ করুন। ট্রানজেকশন আই ডি টি সংরক্ষন করুন। </li>
                                <li>ধাপ-২: নিমোক্ত ফরমের সবগুলো তথ্য পূরণ করুন।  bKash Mobile No এবং bKash Transaction ID (পূর্বে সংরক্ষনকৃত ট্রানজেকশন আই ডি  )টি  সর্তকতার সহিত নির্ধারিত ঘরে পূরণ করন। </li>
                                <li>ধাপ-২:  ই-মেইলের মাধ্যমে  ইনভাইটেশন  লেটার পেয়ে যাবেন। ধন্যবাদ</li>

                                <li><b> যে কোন প্রয়োজনে </b>
                                        <?php
                                        $bkashNumber='';
                                        foreach($toBkash as $key=> $tobKash){
                                            $bkashNumber .=  $tobKash." (".$key."), ";
                                        }

                                        echo rtrim($bkashNumber," ,!");
                                        ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul id="registration_note">
                                <li>bKash Account No :
                                    <br/>
                                    017**, 0171**,
                                </li>
                                <li> Subscription Fees: 0.00(BDT)</li>
                                <li>Registration Deadline is <b>10 October 2023</b>.  </li>
                                <li> Workshop <b>Date:</b> ----</li>

                                <li> <b>Venue:</b> ---</li>

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center position-relative" >
                        <div class="col-lg-12">
                            <div class="">
                                <form>
                                    <div class="row g-3">


                                        <div class="col-12 col-sm-3">
                                            <label  id="levelFontSize">Title <span class="mandatory_field">(*)</span> </label>
                                            <select id="title"  name="title"
                                                    class="form-control">
                                                <option value="">Select Title</option>
                                                <option value="1">Professor</option>
                                                <option value="2">Associate Professor</option>
                                                <option value="3">Senior Consultant</option>
                                                <option value="4">Assistant Professor</option>
                                                <option value="5">Junior Consultant</option>
                                                <option value="7">Postgraduate Dr.</option>
                                                <option value="6">Doctor</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <label id="levelFontSize">Name <span class="mandatory_field">(*)</span></label>
                                            <input id="name" type="text" name="name" placeholder="Enter Name" class="form-control">
                                        </div>




                                        <div class="col-12">
                                            <label id="levelFontSize">Institute <span class="mandatory_field">(*)</span></label>
                                            <input id="institute" type="text" name="institute" placeholder="Enter Institute"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">Degree <span class="mandatory_field">(*)</span></label>
                                            <input id="degree" type="text" name="degree" placeholder="Enter Degree"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">Mobile No (Applicant) <span class="mandatory_field">(*)</span></label>
                                            <input id="mobile_personal" type="text" name="mobile" maxlength="11"
                                                   placeholder="Enter Mobile No(Applicant)" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">E-mail <span class="mandatory_field">(*)</span></label>
                                            <input id="email" type="text" name="email" placeholder="Enter Email"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label id="levelFontSize">Amount <span class="mandatory_field">(*)</span></label>
                                            <input id="amount" type="text" value="0.00" name="amount" maxlength="11" placeholder="Amount"
                                                   readonly class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">To bKash Mobile No <span class="mandatory_field">(*)</span>  (যে বিকাশ নাম্বারে টাকা পাঠানো হয়েছে)</label>
                                            <select id="to_bksah" type="text" name="to_bksah"
                                                    class="form-control">
                                                <option value="">Select One</option>
                                                    <?php
                                                foreach($toBkash as $key=> $tobKash){
                                                    ?>
                                                <option value="<?php echo $tobKash ?>"><?php echo $tobKash." (".$key.")" ?></option>
                                                    <?php
                                                }
                                                    ?>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">From bKash Mobile No <span class="mandatory_field">(*) </span>(যে বিকাশ নাম্বার থেকে টাকা পাঠানো হয়েছে)</label>
                                            <input id="bkash_mobile" type="text" name="bkash_mobile" maxlength="11"
                                                   placeholder="Example: 01830000000" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">bKash Transaction ID <span class="mandatory_field">(*)</span></label>
                                            <input id="bkash_trans_id" type="text" name="bkash_trans_id" maxlength="50"
                                                   placeholder="Example: 6EJ1HTMLW5" class="form-control">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Registration Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="#" class="form-horizontal" method="post" id="registration_form">


                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Registration</h5>
                        <h1 class="display-4">Bangladesh School of Oncoplastic Surgery</h1>
                    </div>
                    <p>Published Very Soon. Thanks</p>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <style>

        #levelFontSize{
            font-weight: bold;
            font-size: 16px;
            color:#333;
        }
    </style>

@endsection



