@extends('layouts.importir')
@section('title', 'Kontak Kami')
@include('header')
@section('container')
<div class="ubea-blog mt-10" id="ubea-blog" data-section="blog">
    <div class="ubea-container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center ubea-heading">
                <h2>KONTAK KAMI</h2>
                <p>Anda dapat berkonsultasi terlebih dahulu SECARA GRATIS sebelum anda memutuskan bekerja sama dengan kami</p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-4">
                <center class="card" style="max-width: 400px; margin: 20px auto;">
                    <span class="font-weight-bold">PT Glori Global Sukses</span>
                    <hr />
                    <img class="image-responsive" src="{{url('contact/naomi.jpg')}}" style="border-radius: 50%; height: 300px; width: auto; object-fit: cover; object-position: top;">
                    <h4 class="contact-name">Naomi Adista</h4>
                    <span class="font-italic font-weight-light">Marketing Exclusive</span>
                    <hr />
                    <div style="font-size: 16px">(+62) 822 8457 3105</div>
                    <small class="block" style="font-size: 14px"><a href="mailto:naomiadista@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">naomiadista@gloriglobalsukses.com</a></small>
                </center>
            </div>
            <div class="col-sm-4">
                <center class="card" style="max-width: 400px; margin: 20px auto;">
                    <span class="font-weight-bold">PT Glori Global Sukses</span>
                    <hr />
                    <img class="image-responsive" src="{{url('contact/calista.jpg')}}" style="border-radius: 50%; height: 300px; width: auto; object-fit: cover; object-position: top;">
                    <h4 class="contact-name">Callista Zahra</h4>
                    <span class="font-italic font-weight-light">Marketing Exclusive</span>
                    <hr />
                    <div style="font-size: 16px">(+62) 813 7178 7680</div>
                    <small class="block" style="font-size: 14px"><a href="mailto:callistazahra@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">callistazahra@gloriglobalsukses.com</a></small>
                </center>
            </div>
            <div class="col-sm-4">
                <center class="card" style="max-width: 400px; margin: 20px auto;">
                    <span class="font-weight-bold">PT Glori Global Sukses</span>
                    <hr />
                    <img class="image-responsive" src="{{url('contact/felicia-2.jpg')}}" style="border-radius: 50%; height: 300px; width: auto; object-fit: cover; object-position: top;">
                   <h4 class="contact-name">Felicia Eliyana</h4>
                    <span class="font-italic font-weight-light">Marketing Exclusive</span>
                    <hr />
                    <div style="font-size: 16px">(+62) 821 8191 4097</div>
                    <small class="block" style="font-size: 14px"><a href="mailto:feliciaeliyana@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">macromartinus@gloriglobalsukses.com</a></small>
                </center>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12">
                <center class="card" style="max-width: 350px; margin: 20px auto;">
                    <span class="font-weight-bold">PT Glori Global Sukses</span>
                    <hr />
                    <img class="image-responsive" src="{{url('contact/davin.jpeg')}}" style="border-radius: 50%; height: 300px; width: auto; object-fit: cover; object-position: top;">
                   <h4 class="contact-name">Davin Anggara</h4>
                    <span class="font-italic font-weight-light">Marketing Representative - Jakarta Utara</span>
                    <hr />
                    <div style="font-size: 16px">(+62) 822 6894 7572</div>
                    {{-- <small class="block" style="font-size: 14px"><a href="mailto:feliciaeliyana@gloriglobalsukses.com?Subject=Inquiry%20on%20Importir" target="_top">macromartinus@gloriglobalsukses.com</a></small> --}}
                </center>
            </div>
        </div>
        <div class="col">
            <table style="border-collapse:separate; border-spacing:0 9px; font-size: 18px; text-align: center; width: 100%">
                <tr>
                    <td colspan="2">
                        <span class="icon">
                            <i class="icon-map" style="font-size: 30px; color: firebrick;"></i>
                        </span> PT Glori Global Sukses <br /> Ruko Puri Selebriti Blok A No 9 Batam - Kepulauan Riau
                    </td>
                </tr>
                <tr>
                    <td>
                       <span class="icon">
                            <i class="icon-facebook" style="font-size: 30px; color: #3b5998"></i>
                        </span> <a href="https://www.facebook.com/PT-Glori-Global-Sukses-100629498187326/" target="_blank" alt="PT Glori Global Sukses" title="PT Glori Global Sukses">PT Glori Global Sukses</a>
                    </td>
                    <td>
                       <span class="icon">
                            <i class="icon-instagram" style="font-size: 30px; color: #3F729B"></i>
                        </span> <a href="https://instagram.com/gloglo.co.id?igshid=1adr2wokti7g" target="_blank" alt="PT Glori Global Sukses" title="PT Glori Global Sukses">PT Glori Global Sukses</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
