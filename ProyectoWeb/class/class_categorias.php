<?php

	class Categorias{
		private $nombreCategoria;

		public function __construct(
									$nombreCategoria){
			$this->nombreCategoria = $nombreCategoria;
			
	
		}

		public function getNombreCategoria(){
			return $this->nombreCategoria;
		}

		public function setNombreCategoria(){
			$this->nombreCategoria = $nombreCategoria;
		}
		
		public static function checkBoxCategoria($conexion){
				$categorias = $conexion->ejecutarInstruccion('
							SELECT 
								codigo_categoria, 
								nombre_categoria
							FROM tbl_categorias 
						');

						while ($fila_categoria = $conexion->obtenerFila($categorias)) {
					?>
						<label>
								<input type='checkbox' name='chkcategorias[]' id='chkcategorias[]' 
								value='<?php echo $fila_categoria['codigo_categoria'];?>'>
								<?php  echo $fila_categoria['nombre_categoria']; ?>
						</label><br>
					<?php
						}
						$conexion->liberarResultado($categorias);
		}
	}

?>