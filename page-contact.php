<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>

  <style>
    .mw_wp_form {
      width: 100%;
      color: #333;
    }

    .mw_wp_form table.mailform-tbl {
      width: 100%;
      margin-bottom: 40px;
    }

    .mw_wp_form table tr {
      width: 100%;
      border-bottom: 1px dotted #ccc;
      padding: 30px 0;
      font-weight: normal;
    }

    .mw_wp_form table tr:first-child {
      border-top: 1px dotted #ccc;
    }

    .mw_wp_form table th {
      padding: 20px 0;
      text-align: left;
      vertical-align: top;
      font-weight: normal;
      width: 30%;
      float: left;
    }

    .mw_wp_form table th .attention {
      font-size: 80%;
      margin-left: 10px;
      color: red;
      padding: 3px;
    }

    .mw_wp_form table td {
      padding: 20px 0;
      width: 70%;
      float: left;
    }

    .mw_wp_form table td.w50 input,
    .mw_wp_form table td.w50 select {
      width: 50%;
      box-sizing: border-box;
    }

    .mw_wp_form table td.w80 input,
    .mw_wp_form table td.w80 select {
      width: 80%;
      box-sizing: border-box;
    }

    .mw_wp_form table td.w80 textarea {
      width: 80%;
      box-sizing: border-box;
    }

    .mw_wp_form #submit-button {
      text-align: center;
    }

    .mw_wp_form #submit-button input {
      margin: 1em;
      display: inline-block;
      padding: 10px 30px;
      border: 1px solid #c19e56;
      background: #c19e56;
      color: #fff;
      box-sizing: border-box;
      height: 40px;
      -webkit-appearance: none;
      border-radius: 5px;
      font-size: 90%;
    }

    .mw_wp_form #submit-button input[name="submitBack"] {
      margin: 1em;
      display: inline-block;
      padding: 10px 30px;
      border: 1px solid #999;
      background: #999;
      color: white;
      box-sizing: border-box;
      height: 40px;
      -webkit-appearance: none;
      border-radius: 5px;
      font-size: 90%;
    }

    .mw_wp_form .form_step {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 0 20px 0;
      list-style: none;
    }

    .mw_wp_form .form_step>li {
      display: block;
      position: relative;
      padding: 0.5em;
      width: 22%;
      border: 1px solid currentColor;
      color: #C19E56;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      margin: 0;
    }

    .mw_wp_form .form_step>li:nth-of-type(n + 2) {
      margin: 0px 0px 0px 4%;
    }

    .mw_wp_form .form_step>li:nth-of-type(n + 2):before {
      position: absolute;
      top: 50%;
      left: -1.5em;
      width: 0.5em;
      height: 0.5em;
      border-top: 2px solid #C19E56;
      border-left: 2px solid #C19E56;
      transform: translateY(-50%) rotate(135deg);
      content: "";
    }

    .mw_wp_form_input .form_step>li:nth-of-type(1),
    .mw_wp_form_preview .form_step>li:nth-of-type(2),
    .mw_wp_form_complete .form_step>li:nth-of-type(3) {
      background-color: #C19E56;
      color: #fff;
    }

    @media screen and (max-width: 768px) {
      .mw_wp_form .form_step>li {
        font-size: 10px;
        width: 30%;
      }

      .mw_wp_form table td {
        width: 65%;
        float: right;
      }

      .mw_wp_form table td.w50 input,
      .mw_wp_form table td.w50 select {
        width: 100%;
        box-sizing: border-box;
      }

      .mw_wp_form table td.w80 input,
      .mw_wp_form table td.w80 select {
        width: 100%;
        box-sizing: border-box;
      }

      .mw_wp_form table td.w80 textarea {
        width: 100%;
        box-sizing: border-box;
      }
    }
  </style>

</head>

<body>
  <header>
    <?php get_template_part(('template-parts/header/header')); ?>
  </header>

  <?php while (have_posts()) : the_post(); ?>

    <?php remove_filter('the_content', 'wpautop'); ?>
    <?php the_content(); ?>

  <?php endwhile; ?>

  <footer>
    <?php get_template_part('template-parts/footer/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>