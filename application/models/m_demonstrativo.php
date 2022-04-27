<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_demonstrativo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function lst_demonstrativo($p){
      $query = $this->db->query("SELECT * FROM RM.VW_ALUNO_NOTAS_FALTA_II  WHERE IDPERLET = (select s.idperlet from rm.spletivo s where s.codperlet = to_char(sysdate,'yyyy')) and RA = '".$p['ra']."' ORDER BY NM_DISCIPLINA_RED");
      return $query->result_array();
    }

    /*function lst_demonstrativo($p){
        $query = $this->db->query("SELECT
      1 AS CODCOLIGADA,
      1 as IDPERLET,
      SDISCIPLINA.CODDISC AS CD_DISCIPLINA,
      SDISCIPLINA.NOME AS NM_DISCIPLINA,
      SMATRICULA.RA AS CD_ALUNO,
      PPESSOA.NOME AS NM_ALUNO,
      STURMADISC.CODTURMA as CODTURMA,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>11)
                      AS P1_1B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>12)
                      AS P2_1B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>13)
      AS MAIC_1B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>16)
      AS MB_1B,
      0 AS FT_1B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>21)
      AS P1_2B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>22)
      AS P2_2B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>23)
      AS MAIC_2B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>26)
      AS MB_2B,
      0 AS FT_2B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>31)
      AS P1_3B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>32)
      AS P2_3B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>33)
      AS MAIC_3B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>36)
      AS MB_3B,
      0 AS FT_3B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>41)
      AS P1_4B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>42)
      AS P2_4B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>43)
      AS MAIC_4B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>46)
      AS MB_4B,
      0 AS FT_4B,
      RM.F_NOTA_ETAPA(P_CODCOLIGADA=>SMATRICULA.CODCOLIGADA,
                      P_IDPERLET=>SMATRICULA.IDPERLET,
                      P_RA=>SMATRICULA.RA,
                      P_IDTURMADISC=>SMATRICULA.IDTURMADISC,
                      P_CODTURMA=>STURMADISC.CODTURMA,
                      P_CODDISC=>SDISCIPLINA.CODDISC,
                      P_CODETAPA=>66)
      AS MF

                           FROM
                             RM.SMATRICULA  ,
                             RM.STURMADISC  ,
                             RM.SDISCIPLINA  ,
                             RM.SSTATUS  ,
                             RM.SALUNO  ,
                             RM.PPESSOA  ,
                             RM.SPLETIVO  ,
                             RM.GFILIAL  ,
                             RM.STIPOCURSO
                           WHERE
                             SMATRICULA.CODCOLIGADA = STURMADISC.CODCOLIGADA AND
                             SMATRICULA.IDTURMADISC = STURMADISC.IDTURMADISC AND
                             STURMADISC.CODCOLIGADA = SDISCIPLINA.CODCOLIGADA AND
                             STURMADISC.CODDISC = SDISCIPLINA.CODDISC AND
                             SSTATUS.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SSTATUS.CODSTATUS = SMATRICULA.CODSTATUS AND
                             SALUNO.CODCOLIGADA = SMATRICULA.CODCOLIGADA AND
                             SALUNO.RA = SMATRICULA.RA AND
                             PPESSOA.CODIGO = SALUNO.CODPESSOA AND
                             SMATRICULA.CODCOLIGADA = SPLETIVO.CODCOLIGADA AND
                             SMATRICULA.IDPERLET = SPLETIVO.IDPERLET AND
                             STURMADISC.CODCOLIGADA = GFILIAL.CODCOLIGADA AND
                             STURMADISC.CODFILIAL = GFILIAL.CODFILIAL AND
                             SDISCIPLINA.CODCOLIGADA = STIPOCURSO.CODCOLIGADA AND
                             SDISCIPLINA.CODTIPOCURSO = STIPOCURSO.CODTIPOCURSO AND

                             (
                               SMATRICULA.CODCOLIGADA = 1 AND
                               SMATRICULA.IDPERLET = 1 AND
                               STURMADISC.CODTURMA NOT LIKE 'EC%' AND
                               SMATRICULA.RA = '".$p['ra']."' AND
                               SMATRICULA.IDTURMADISCORIGEM IS NULL
                              )

        ORDER BY SDISCIPLINA.NOME");
        return $query->result_array();

    }*/
   


}



