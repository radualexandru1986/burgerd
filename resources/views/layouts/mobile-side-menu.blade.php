<div class="side-container closed">
    <div class="close-button text-center text-light" style="font-size: 50px;">
        <i class="bi bi-x-square" onclick="toggleMenuState()"></i>
        <div class="mobileMenuButtonsContainer">
            <button class="btn btn-dark w-100 py-4" onclick="window.location.href='/home'">Home</button>
            <button class="btn btn-dark w-100 py-4" onclick="window.location.href='/order'">Order</button>
            <button class="btn btn-dark w-100 py-4" onclick="window.location.href='/faq'" >F.A.Q</button>
            <button class="btn btn-dark w-100 py-4" onclick="window.location.href='/contact'">Contact</button>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function toggleMenuState()
        {
            let store = window.localStorage;
            if(document.querySelector('.side-container').classList.contains('closed') && store.getItem('menuState')==='open') {
                toggleMenu(store.getItem('menuState'))
            }
            if (store.getItem('menuState') ) {
                if (store.getItem('menuState')==='open'){
                    store.setItem('menuState', 'closed');
                }else{
                    store.setItem('menuState', 'open');
                }
                toggleMenu(store.getItem('menuState'))
            }

            if(!store.getItem('menuState')){
                store.setItem('menuState', 'open')
                toggleMenu(store.getItem('menuState'))
            }

        }

        function toggleMenu(status) {
            if(status==='closed') {
                document.querySelector('.side-container').classList.replace('open', 'closed')
            }
            if(status==='open') {
                document.querySelector('.side-container').classList.replace('closed', 'open')
            }
        }

    </script>
@endpush
