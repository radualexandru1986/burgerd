<div class="side-container closed">

</div>
@push('scripts')
    <script>

        document.getElementById('toggleMobileMenu').addEventListener('click', ()=>{
            toggleMenuState()
        })

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
