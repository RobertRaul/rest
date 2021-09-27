<div>
    <p>
        Mostrando registros del {{ $dtResult->firstItem() }} al {{ $dtResult->lastItem() }} de un total de {{ $dtResult->total() }} registros
    </p>
    <p>
        {{ $dtResult->links() }}
    </p>
</div>  