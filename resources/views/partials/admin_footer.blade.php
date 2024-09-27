<footer class="bg-light mt-3 sticky-footer">
    <div class="container-fluid footer-section">
        <div class="container">
            <div class="row ">
                <div class="col-sm-6 text-left">
                    <p class="mb-0 py-2">Copyright &copy; {{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->name : '' }} </p>
                </div>
                <div class="col-sm-6 text-md-end text-start">
                    <p class="mb-0 py-2">Developed By: <a href="https://imam.ntsoftwareltd.com/" target="_blank"
                            class="">Imam Hosen</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
