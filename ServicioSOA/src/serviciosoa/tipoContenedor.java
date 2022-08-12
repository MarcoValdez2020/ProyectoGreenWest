/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package serviciosoa;

/**
 *
 * @author itsje
 */
public class tipoContenedor {
    
  private final int id_tipoConte, puntos;
  private final String tipoContenedor;


  public tipoContenedor(final int id_tipoConte, final String tipoContenedor, final int puntos) {
      this.id_tipoConte = id_tipoConte;
      this.tipoContenedor = tipoContenedor;
      this.puntos = puntos;
  }
}