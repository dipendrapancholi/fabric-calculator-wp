jQuery( document ).ready( function( $ ) {

    function wcofuaFabricCalculate() {

        // Get input values
        let materialWidth   = parseFloat( $( '#wcofua-material-width' ).val() );
        let materialHeight  = parseFloat( $( '#wcofua-material-height').val() );
        let pieceWidth      = parseFloat( $(  '#wcofua-piece-width').val() );
        let pieceHeight     = parseFloat( $( '#wcofua-piece-height').val() );

        let Measurement   = $( '#wcofua-measurement' ).val();

        // Calculate the number of pieces for original orientation
        let piecesAcrossOriginal= Math.floor( materialWidth / pieceWidth );
        let piecesDownOriginal  = Math.floor( materialHeight / pieceHeight );
        let totalPiecesOriginal = piecesAcrossOriginal * piecesDownOriginal;

        // Calculate the number of pieces for rotated orientation
        let piecesAcrossRotated = Math.floor( materialWidth / pieceHeight );
        let piecesDownRotated   = Math.floor( materialHeight / pieceWidth );
        let totalPiecesRotated  = piecesAcrossRotated * piecesDownRotated;

        // Determine the best orientation
        let bestOrientation = 'original';
        let totalPiecesBest = totalPiecesOriginal;
        let piecesAcrossBest= piecesAcrossOriginal;
        let piecesDownBest  = piecesDownOriginal;
        let bestPieceWidth  = pieceWidth;
        let bestPieceHeight = pieceHeight;

        if( totalPiecesRotated > totalPiecesOriginal ) {

            bestOrientation = 'rotated';
            totalPiecesBest = totalPiecesRotated;
            piecesAcrossBest= piecesAcrossRotated;
            piecesDownBest  = piecesDownRotated;
            bestPieceWidth  = pieceHeight;
            bestPieceHeight = pieceWidth;
        }
        
        let resultText = $( '#wcofua-result-text' ).val();
        resultText = resultText.replace( '{totalPieces}', totalPiecesBest );
        resultText = resultText.replace( '{bestPieceWidth}', bestPieceWidth + Measurement );
        resultText = resultText.replace( '{bestPieceHeight}', bestPieceHeight + Measurement );
        
        // Display the result
        //resultText = `You can cut ${totalPiecesBest} pieces of ${bestPieceWidth}${Measurement} x ${bestPieceHeight}${Measurement} from the material.`;
        $( '#wcofua-fabric-calculator-result-text' ).html( '<p>' + resultText + '</p>' );

        // Create a visual representation of the pieces
        let canvas = document.getElementById( 'wcofua-fabric-preview' );
        let ctx = canvas.getContext( '2d' );

        // Clear the canvas
        ctx.clearRect( 0, 0, canvas.width, canvas.height );

        let dimention_factor = Math.ceil( 500 / materialWidth );

        // Set canvas dimensions
        canvas.style.border = '1px solid';
        canvas.width = materialWidth * dimention_factor;
        canvas.height = materialHeight * dimention_factor;

        ctx.strokeStyle = 'black';
        ctx.fillStyle = 'lightgray';

        // Draw the pieces
        for (let i = 0; i < piecesDownBest; i++) {
            for (let j = 0; j < piecesAcrossBest; j++) {

                let x = j * bestPieceWidth * dimention_factor;
                let y = i * bestPieceHeight * dimention_factor;
                let w = bestPieceWidth * dimention_factor;
                let h = bestPieceHeight * dimention_factor;
                
                ctx.fillRect(x, y, w, h);
                ctx.strokeRect(x, y, w, h);
            }
        }
    }

    $( '#wcofua-fabric-calculator-form' ).on( 'submit', function( event ) {
        event.preventDefault();
        wcofuaFabricCalculate();
    });

    // Calculate on load
    wcofuaFabricCalculate();
});