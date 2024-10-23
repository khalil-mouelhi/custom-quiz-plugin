<?php
if ( !defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log that the template is being loaded
error_log("Quiz template is being loaded");
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Quiz</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script> 

</head>
<body>
<div class="quiz-background"> 
  <!-- First Header: Visible on Slide 1 -->
  <div class="quiz-header-first"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/main-logo.png" alt="Quiz Logo Left" class="quiz-logo-left"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hpv-logos-1.png" alt="Quiz Logo Center" class="quiz-logo-center"> </div>
  
  <!-- Second Header: Visible from Quiz Start -->
  <div class="quiz-header-second">
    <div class="lives-container">
      <h3 class="lives-headline">Leben</h3>
      <?php for ($i = 0; $i < 5; $i++) : ?>
      <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hearts.png" alt="Heart" class="heart">
      <?php endfor; ?>
    </div>
    <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hpv-logos-1.png" alt="Quiz Logo" class="quiz-logo">
    <button class="reset-button-second-header">Von vorne beginnen <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/reset-button.png" alt="Reset Icon"></button>
  </div>
  <div class="quiz-container"> 
    <!-- Introductory Slide 0 -->
    <div class="slide-background" data-slide="0" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/01_start-page-quiz.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content">
            <div class="column column-left-first-slide">
              <div> <span class="over-headline-first-slide">Teste dein Wissen</span> <br>
                <span class="headline-first-slide">über HPV!</span> </div>
              <button class="next-slide call-to-action-slide">Los geht's</button>
            </div>
            <div class="column hide-mobile"> 
              <!-- Empty column --> 
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Introductory Slide 1 -->
    <div class="slide-background" data-slide="1" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Second-slide-background.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content slide-content-second-slide">
            <div class="column column-left-second-slide">
              <p>Die <strong>HPVighters</strong> sind winzige Roboter, deren Mission es ist, in den menschlichen Körper
                zu fliegen und gegen die bösen <strong>HP-Viren</strong> zu kämpfen.<br>
                <br>
                Um ein vollwertiges Mitglied zu werden, musst du als Lehrling erfolgreich deine erste Mission
                abschließen.<br>
                <br>
                Während deiner Reise wirst du durch <strong>Quizfragen</strong> herausgefordert, die dir wertvolles
                Wissen über die Bekämpfung der Viren vermitteln.<br>
                <br>
                Lerne dich gegen HPV zu wappnen und schließe dich jetzt dem Kampf an!</p>
              <button class="next-slide call-to-action-second-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/icon-weiter-button.png" alt="Icon"> </button>
            </div>
            <div class="column hide-mobile"> 
              <!-- device-option --> 
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Device Selection Slide 2 -->
    <div class="slide-background" data-slide="2" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Select-avatar-slide.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content-centered">
            <h1 class="headline-device-selection">Auf welchem Gerät spielst du?</h1>
            <div class="device-options">
              <button class="device-option desktop"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Desktop_tablet.png" alt="Desktop Image" class="device-image">
              <h2 class="headline-devices">Laptop oder Tablet</h2>
              </button>
              <button class="device-option mobile"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/mobile-device.png" alt="Desktop Image" class="device-image">
              <h2 class="headline-devices"> Mobile </h2>
              </button>
            </div>
          </div>
          <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
          <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
        </div>
      </div>
    </div>
    
    <!-- Gender Selection Slide 3 -->
    <div class="slide-background" data-slide="3" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Select-avatar-slide.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content-centered">
            <h1 class="headline-gender-selection">Bist du ein Mann, eine Frau oder divers?</h1>
            <div class="gender-options">
              <button class="gender-option">Männlich</button>
              <button class="gender-option">Weiblich</button>
              <button class="gender-option">Divers</button>
            </div>
          </div>
          <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
          <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
        </div>
      </div>
    </div>
    
    <!-- Avatar Selection Slide 4 -->
    <div class="slide-background" data-slide="4" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Select-avatar-slide.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content slide-content-avatar-slide">
            <div class="column column-left-avatar-slide"> 
              <!-- Avatar Slider -->
              <div class="avatar-slider"> 
                <!-- Slide Counter -->
                <div class="slide-count"> <span id="current-slide-number">1</span> / <span id="total-slides-number">3</span> </div>
                <button class="avatar-nav prev-avatar"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-select-avatar.png" alt="Previous Avatar" class="nav-icon"> </button>
                <img src="" alt="Avatar" class="avatar-image" style="display:none;">
                <button class="avatar-nav next-avatar"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/icon-right-select-avatar.png" alt="Next Avatar" class="nav-icon"> </button>
              </div>
            </div>
            <div class="column column-right-avatar-slide">
              <div class="headline-container">
                <h2 class="headline-avatar-selection">Wähle dein Roboter-Modell</h2>
              </div>
              <div class="avatar-info-container">
                <h3 class="section-title">Modell</h3>
                <h2 class="avatar-title"></h2>
                <h3 class="section-title-avatar-details">Besonderheit</h3>
                <div class="avatar-details"> <img src="" alt="Icon" class="avatar-icon" style="display:none;">
                  <div class="avatar-text">
                    <h3 class="avatar-subtitle"></h3>
                    <p class="avatar-description"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
          <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
        </div>
      </div>
    </div>
    
    <!-- Avatar Confirmation Slide 5 -->
    <div class="slide-background" data-slide="5" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Select-avatar-slide.jpg');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content slide-content-fourth-slide">
            <div class="column column-left-fourth-slide"> 
              <!-- Display the chosen avatar --> 
              <img src="" alt="Chosen Avatar" class="chosen-avatar-image" style="display:none;"> </div>
            <div class="column column-right-fourth-slide">
              <div class="headline-container">
                <h2 class="headline-avatar-confirmation">Gib deinen Namen oder einen Spitznamen ein</h2>
              </div>
              <div class="name-input-container">
                <input class="avatar-name-input" type="text" id="name-input" placeholder="Hier eingeben...">
              </div>
            </div>
          </div>
          <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
          <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
        </div>
      </div>
    </div>
    
    <!-- Knowledge Level Selection Slide 6 -->
    <input type="hidden" id="selected-level" name="selected_level" value="">
    <div class="slide-background" data-slide="6" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Select-avatar-slide.jpg');">
        <div class="questions-slider">
            <div class="question-slide">
                <div class="slide-content slide-content-knowledge-level-slide">
                    <div class="column column-left-knowledge-level-slide"> 
                        <!-- Display the chosen avatar --> 
                        <img src="" alt="Chosen Avatar" class="chosen-avatar-image" style="display:none;"> 
                    </div>
                    <div class="column column-right-knowledge-level-slide">
                        <div class="headline-container">
                            <h2 class="headline-knowledge-level">In welcher Klasse bist du?</h2>
                        </div>
                        <div class="knowledge-level-selection">
                            <div class="knowledge-level-options"> 
                                <!-- Numbers from 4 to 10 -->
                                <button type="button" class="knowledge-level-option">4.</button>
                                <button type="button" class="knowledge-level-option">5.</button>
                                <button type="button" class="knowledge-level-option">6.</button>
                                <button type="button" class="knowledge-level-option">7.</button>
                                <button type="button" class="knowledge-level-option">8.</button>
                                <button type="button" class="knowledge-level-option">9.</button>
                                <button type="button" class="knowledge-level-option">10.</button>
                                <button type="button" class="knowledge-level-option">>10.</button>
                            </div>
                        </div>
                
                    </div>
                </div>
                <button type="button" class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
                <button type="submit" class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
            </div>
        </div>
    </div>

    <!-- Slide 7 -->
    <div class="slide-background" data-slide="7" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Background-slide-6.png');">
      <div  class="questions-slider">
        
        <div class="question-slide">
          <div class="slide-content slide-content-sixth-slide">
            <div class="column column-left-sixth-slide">
              <h2 class="headline-sixth-slide">Du befindest dich  gerade in deinem Ausbildungsschiff und fährst zu dem
                Ort, an dem sich die ersten HP-Viren angesiedelt haben.</h2>
              <div class="text-box"> Du hast insgesamt drei Leben — beantwortest du eine Frage falsch, wird dir eines
                abgezogen. Verlierst du alle Leben, leidet deine Punktzahl darunter, welche du am Ende des Spiels
                siehst.
                <div class="lives-container-explanation">
                  <h3 class="lives-headline-explanation">Leben</h3>
                  <?php for ($i = 0; $i < 5; $i++) : ?>
                  <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hearts.png" alt="Heart" class="heart">
                  <?php endfor; ?>
                </div>
              </div>
            </div>
            <div class="column column-right-sixth-slide"> 
              <!-- Empty column or additional content --> 
            </div>
          </div>
          <div class="controls-container">
            <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
            <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- New Slide 8 with One Less Heart Icon -->
    <div class="slide-background" data-slide="8" data-slide-type="intro" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/Background-slide-6.png');">
      <div class="questions-slider">
        <div class="question-slide">
          <div class="slide-content slide-content-sixth-slide">
            <div class="column column-left-sixth-slide">
              <h2 class="headline-sixth-slide">Du befindest dich gerade in deinem Ausbildungsschiff und fährst zu dem Ort, an dem sich die ersten HP-Viren angesiedelt haben.</h2>
              <div class="text-box">Es wird einige Fragen geben, bei denen du <strong>mehrere Antwortmöglichkeiten</strong> hast — wählst du nicht alle richtigen Fragen aus, verlierst du ebenfalls ein Leben.
                <div class="lives-container-explanation">
                  <h3 class="lives-headline-explanation">Leben</h3>
                  <?php for ($i = 0; $i < 4; $i++) : ?>
                  <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hearts.png" alt="Heart" class="heart">
                  <?php endfor; ?>
                  <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/heart-dead.png" alt="Heart" class="heart"> </div>
              </div>
            </div>
            <div class="column column-right-sixth-slide"> 
              <!-- Empty column or additional content --> 
            </div>
          </div>
          <div class="controls-container">
            <button class="slide-navigation prev-slide"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-left-navigation.png" alt="Previous Icon"> Zurück </button>
            <button class="slide-navigation next-slide"> Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"> </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Reset Confirmation Popup -->
    <div class="reset-popup">
      <div class="popup-icon"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/warnin-popup.png" alt="Top Icon"> </div>
      <h2>Willst du wirklich von vorne beginnen?</h2>
      <p>Achtung, dein Spielfortschritt geht verloren!</p>
      <div class="popup-actions"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/confirm-popup.png" alt="Confirm Icon" class="confirm-reset"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/close-popup.png" alt="Cancel Icon" class="cancel-reset"> </div>
    </div>
<?php
// At the very beginning of your PHP script
error_log("[" . date('Y-m-d H:i:s') . "] Script execution started");

// Dump all POST and GET data
error_log("[" . date('Y-m-d H:i:s') . "] POST data: " . print_r($_POST, true));
error_log("[" . date('Y-m-d H:i:s') . "] GET data: " . print_r($_GET, true));

// Get the selected level from POST or GET
$selected_level = isset($_POST['selected_level']) ? intval($_POST['selected_level']) : (isset($_GET['selected_level']) ? intval($_GET['selected_level']) : null);
error_log("[" . date('Y-m-d H:i:s') . "] Selected level: " . ($selected_level ?? 'None'));

// Determine the quiz name to include based on the selected level
$include_quiz_name = '';
if ($selected_level !== null) {
    if ($selected_level >= 4 && $selected_level <= 7) {
        $include_quiz_name = 'Quiz level 4-7';
    } elseif ($selected_level >= 8) {
        $include_quiz_name = 'Quiz level 8-10';
    }
}

error_log("[" . date('Y-m-d H:i:s') . "] Including quiz name: " . ($include_quiz_name ?? 'None'));

// Modify the query to include only the specified quiz name
$args = array(
    'post_type' => 'custom_quiz',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'name' => sanitize_title($include_quiz_name)
);

error_log("[" . date('Y-m-d H:i:s') . "] Query Args: " . print_r($args, true));

error_log("[" . date('Y-m-d H:i:s') . "] Executing quiz query");
$quizzes = new WP_Query($args);
error_log("[" . date('Y-m-d H:i:s') . "] Number of quizzes found: " . $quizzes->found_posts);
error_log("[" . date('Y-m-d H:i:s') . "] SQL Query: " . $quizzes->request);

if ($quizzes->have_posts()) {
    error_log("[" . date('Y-m-d H:i:s') . "] Quizzes found, starting to process");
    while ($quizzes->have_posts()) : $quizzes->the_post();
        error_log("[" . date('Y-m-d H:i:s') . "] Processing quiz post ID: " . get_the_ID() . ", Name: " . get_the_title());
        $questions = get_field('questions');
        if ($questions) {
            error_log("[" . date('Y-m-d H:i:s') . "] Number of questions for quiz ID " . get_the_ID() . ": " . count($questions));
            foreach ($questions as $question_index => $question) {
                error_log("[" . date('Y-m-d H:i:s') . "] Processing question index: " . $question_index);
                error_log("[" . date('Y-m-d H:i:s') . "] Question data: " . print_r($question, true));
                
                // Determine slide attributes and other variables
                $slide_attributes = '';
                $background_image_url = isset($question['background_image']) ? $question['background_image'] : '';
                $has_informational_content = !empty($question['informational_content']);
                $has_timeline = !empty($question['timeline']);
                $has_selectable_images = !empty($question['selectable_images']);
                $has_human_body = !empty($question['human_body']);
                $headline_hint = isset($question['headline_hint']) ? $question['headline_hint'] : '';
                $text_hint = isset($question['text_hint']) ? $question['text_hint'] : '';
                $has_image_answer = false;

                // Render the appropriate slide layout based on the question type
                if ($has_informational_content) {
                    render_informational_slide($question, $slide_attributes, $question_index, $background_image_url);
                } elseif ($has_timeline) {
                    render_timeline_slide($question, $slide_attributes, $question_index, $background_image_url);
                } elseif ($has_selectable_images) {
                    render_selectable_images_slide($question, $slide_attributes, $question_index, $background_image_url);
                } elseif ($has_human_body) {
                    render_human_body_slide($question, $slide_attributes, $question_index, $background_image_url, $headline_hint, $text_hint);
                } else {
                    render_regular_question_slide($question, $slide_attributes, $question_index, $background_image_url, $headline_hint, $text_hint);
                }
            }
        } else {
            error_log("[" . date('Y-m-d H:i:s') . "] No questions found for this quiz.");
        }
    endwhile;
    wp_reset_postdata();
} else {
    error_log("[" . date('Y-m-d H:i:s') . "] No quizzes found for the selected category.");
    ?>
    <p>No quizzes found for the selected category.</p>
    <?php
}

error_log("[" . date('Y-m-d H:i:s') . "] Script execution completed");

// Helper functions to render different slide types
function render_informational_slide($question, $slide_attributes, $question_index, $background_image_url) {
    ?>
    <div class="slide-background informational-slide" <?php echo $slide_attributes; ?> data-slide="<?php echo $question_index + 9; ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="questions-slider">
            <div class="question-slide">
                <div class="slide-content">
                    <div class="column column-left-first-slide">
                        <p class="headline-informational-slide"><?php echo wp_kses_post($question['informational_content']); ?></p>
                        <button class="next-slide call-to-action-slide-informational">Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function render_timeline_slide($question, $slide_attributes, $question_index, $background_image_url) {
    ?>
    <div class="slide-background" <?php echo $slide_attributes; ?> data-slide="<?php echo $question_index + 9; ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="questions-slider">
            <div class="question-slide">
                <div class="slide-content slide-content-seventh-slide">
                    <div class="column column-left-seventh-slide">
                        <div class="question-box">
                            <h1 class="question-text">Timeline</h1>
                            <h5 class="sub-heading-question">Select the stages</h5>
                            <div class="timeline-container">
                                <?php foreach ($question['timeline'] as $timeline_item) : ?>
                                    <div class="timeline-item">
                                        <input type="checkbox" <?php echo $timeline_item['checkbox'] ? 'checked' : ''; ?> disabled data-correct="<?php echo $timeline_item['is_correct'] ? 'true' : 'false'; ?>" data-explanation="<?php echo esc_attr($timeline_item['explanation'] ?? ''); ?>">
                                        <div class="timeline-title"><?php echo esc_html($timeline_item['title']); ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="show-explanation">Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"></button>
                        </div>
                    </div>
                    <div class="column column-middle-seventh-slide"> <img src="" alt="Chosen Avatar" class="chosen-avatar-image-middle">
                        <div class="explanation" style="display: none;"></div>
                    </div>
                    <div class="column column-right-seventh-slide">
                        <div class="text-container">
                            <div class="icon-overlay"> <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/warnin-popup.png" alt="Icon"> </div>
                            <h2 class="questions-hint">Kapitel: Grundlagen</h2>
                            <p class="text-hint">Du befindest dich gerade in deinem Ausbildungsschiff und fährst zu dem Ort, an dem sich die ersten <strong>HP-Viren</strong> angesiedelt haben. Währenddessen lernst du am Boardcomputer, die Grundlagen über das gefährliche Virus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function render_selectable_images_slide($question, $slide_attributes, $question_index, $background_image_url) {
    ?>
    <div class="slide-background selectable-images-slide" <?php echo $slide_attributes; ?> data-slide="<?php echo $question_index + 9; ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="questions-slider">
            <div class="question-slide">
                <div class="slide-content">
                    <div class="selectable-images-container">
                        <?php
                        foreach ($question['selectable_images'] as $image_data) :
                            $image = $image_data['image'];
                            $button_label = $image_data['button_label'];
                            $button_sublabel = $image_data['button_sublabel'];
                            ?>
                            <div class="selectable-image-wrapper">
                                <div class="selectable-image">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-button">
                                    <?php if ($button_label) : ?>
                                        <h2 class="button-label"><?php echo esc_html($button_label); ?></h2>
                                    <?php endif; ?>
                                    <?php if ($button_sublabel) : ?>
                                        <p class="button-sublabel"><?php echo esc_html($button_sublabel); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="column column-left-first-slide weapon-selection">
                        <h1 class="headline-informational-slide">Suche dir dein Hilfsmittel aus!</h1>
                        <button class="next-slide call-to-action-slide-informational">Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function render_human_body_slide($question, $slide_attributes, $question_index, $background_image_url, $headline_hint, $text_hint) {
    ?>
    <div class="slide-background adjust-height-mobile" <?php echo $slide_attributes; ?> data-slide="<?php echo $question_index + 9; ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="questions-slider adjust-mobile-height">
            <div class="question-slide">
                <div class="slide-content slide-content-seventh-slide mobile-adjustment">
                    <div class="column column-left-seventh-slide">
                        <h1 class="question-text"><?php echo isset($question['question']) ? esc_html($question['question']) : 'No question text available.'; ?></h1>
                        <div class="question-box">
                            <h5 class="sub-heading-question"><?php echo isset($question['sub_heading_question']) ? 
                                esc_html($question['sub_heading_question']) : ''; ?></h5>
                            <div class="interactive-image-container">
                                <img src="<?php echo esc_url($question['human_body']['url']); ?>" alt="Human Body" class="body-image">
                                <?php if (isset($question['body_parts'])) : ?>
                                    <?php foreach ($question['body_parts'] as $part) : ?>
                                        <div class="clickable-area" 
                                             style="left: <?php echo explode(',', $part['coordinates'])[0]; ?>px; top: <?php echo explode(',', $part['coordinates'])[1]; ?>px;"
                                             data-part="<?php echo esc_attr($part['part_name']); ?>">
                                            <input type="radio" 
                                                   id="<?php echo esc_attr($part['part_name']); ?>" 
                                                   name="question_<?php echo $question_index; ?>" 
                                                   value="<?php echo esc_attr($part['part_name']); ?>" 
                                                   data-correct="<?php echo $part['is_correct'] ? 'true' : 'false'; ?>" 
                                                   data-explanation="<?php echo esc_attr($part['explanation'] ?? ''); ?>">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="question-count"></div>
                        <button class="show-explanation" style="display: none;">Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"></button>
                    </div>
                    <div class="column column-middle-seventh-slide">
                        <img src="" alt="Chosen Avatar" class="chosen-avatar-image-middle">
                        <div class="explanation" style="display: none;"></div>
                    </div>
                    <div class="column column-right-seventh-slide">
                        <div class="text-container">
                            <div class="icon-overlay">
                                <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/warnin-popup.png" alt="Icon">
                            </div>
                            <h2 class="questions-hint"><?php echo wp_kses_post($headline_hint); ?></h2>
                            <p class="text-hint"><?php echo wp_kses_post($text_hint); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function render_regular_question_slide($question, $slide_attributes, $question_index, $background_image_url, $headline_hint, $text_hint) {
    $has_image_answer = false;
    if (isset($question['possible_answers']) && is_array($question['possible_answers'])) {
        $has_image_answer = array_reduce($question['possible_answers'], function($carry, $answer) {
            return $carry || !empty($answer['answer_image']);
        }, false);
    }
    ?>
    <div class="slide-background adjust-height-mobile" <?php echo $slide_attributes; ?> data-slide="<?php echo $question_index + 9; ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <div class="questions-slider adjust-mobile-height">
            <div class="question-slide">
                <div class="slide-content slide-content-seventh-slide mobile-adjustment">
                    <div class="column column-right-seventh-slide">
                        <div class="text-container">
                            <div class="icon-overlay">
                                <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/warnin-popup.png" alt="Icon">
                            </div>
                            <h2 class="questions-hint"><?php echo wp_kses_post($headline_hint); ?></h2>
                            <p class="text-hint"><?php echo wp_kses_post($text_hint); ?></p>
                        </div>
                    </div>
                    <div class="column column-middle-seventh-slide">
                        <img src="" alt="Chosen Avatar" class="chosen-avatar-image-middle">
                    </div>
                    <div class="column column-left-seventh-slide">
                        <h1 class="question-text"><?php echo isset($question['question']) ? esc_html($question['question']) : 'No question text available.'; ?></h1>
                        <div class="question-box">
                            <h5 class="sub-heading-question"><?php echo isset($question['sub_heading_question']) ? esc_html($question['sub_heading_question']) : ''; ?></h5>
                            <div class="answers-list <?php echo $has_image_answer ? 'image-answers-list' : ''; ?>">
                                <?php if (isset($question['possible_answers'])) : ?>
                                    <?php foreach ($question['possible_answers'] as $answer_index => $answer) : ?>
                                        <?php if (isset($answer['is_correct'])) : ?>
                                            <?php if (!empty($answer['answer_image'])) : ?>
                                                <label class="answer-option image-answer">
                                                    <input 
                                                    type="radio" 
                                                    name="question_<?php echo $question_index; ?>" 
                                                    value="<?php echo esc_attr($answer_index); ?>" 
                                                    data-correct="<?php echo $answer['is_correct'] ? 'true' : 'false'; ?>" 
                                                    data-explanation="<?php echo esc_attr($answer['explanation'] ?? ''); ?>"
                                                  >
                                                    <div class="image-description"><?php echo esc_html($answer['answer_image_description'] ?? ''); ?></div>
                                                    <img src="<?php echo esc_url($answer['answer_image']['url']); ?>" alt="<?php echo esc_attr($answer['answer_image']['alt']); ?>">
                                                    <div class="image-title"><?php echo esc_html($answer['answer_image']['title']); ?></div>
                                                </label>
                                            <?php elseif (!empty($answer['answer'])) : ?>
                                                <label class="answer-option">
                                                    <input 
                                                    type="radio" 
                                                    name="question_<?php echo $question_index; ?>" 
                                                    value="<?php echo esc_attr($answer['answer']); ?>" 
                                                    data-correct="<?php echo $answer['is_correct'] ? 'true' : 'false'; ?>" 
                                                    data-explanation="<?php echo esc_attr($answer['explanation'] ?? ''); ?>"
                                                  >
                                                    <?php echo esc_html($answer['answer']); ?> 
                                                </label>
                                            <?php endif; ?>
                                            <br>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>No possible answers available.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="question-count"></div>
                        <button class="show-explanation" style="display: none;">Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon"></button>
                    </div>
                    <div class="explanation" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


<!-- Final Slide -->
<div class="slide-background" data-slide="final" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/final_slide_background.jpg');">
  <div class="questions-slider">
    <div class="question-slide">
      <div class="slide-content slide-content-final-slide">
        <div class="final-slide-container">
          <h1 class="final-slide-headline">Herzlichen Glückwunsch,</h1>
          <h1 class="final-slide-username">!</h1>
          <p class="final-slide-result">Du hast deine Ausbildung erfolgreich abgeschlossen und bist nun ein <strong>Mitglied der HPVighter!</strong></p>
        </div>
        <div class="final-slide-score-container">
          <h1 class="final-slide-score"></h1>
        </div>
        <!-- Robot images --> 
        <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/final-slide-robot.png" alt="Robot 1" class="robot-image robot-top-left">
        <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/final-slide-robot_1.png" alt="Robot 2" class="robot-image robot-top-right">
        <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/robot_final_slide_3.png" alt="Robot 3" class="robot-image robot-bottom-left">
 <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/final-slide-robot.png" alt="Robot 4" class="robot-image robot-bottom-right">
        
        <!-- Button Container -->
        <div class="button-container">
          <button class="download-certificate" onclick="generateAndDownloadCertificate()">
            Urkunde downloaden
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Certificate Container -->
<div class="certificate-container" style="display: none;">
  <div class="certificate-background" style="background-image: url('https://hpv.4dd-workspace.de/wp-content/uploads/2024/10/certificate-background.jpg');">
    <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hpv-logos-1.png" alt="Logo" class="certificate-logo">
    <h1 style="color:#333;">Herzlichen Glückwunsch,</h1>
    <h2 class="certificate-username" style="color:#82C800;"></h2>
    <p class="final-certificate-text">Du hast deine Ausbildung erfolgreich abgeschlossen und bist nun ein <strong>Mitglied der HPVighter!</strong></p>
    <img src="" alt="Selected Robot" class="certificate-robot">
    <span class="certificate-score-label" style="color:#333;">Dein Punktestand</span>
    <p class="certificate-score"></p>
  </div>
</div>
</div>
</div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Variables and Initial Setup
        const slides = document.querySelectorAll('.slide-background');
        const resetButton = document.querySelector('.reset-button-second-header');
        const quizHeaderFirst = document.querySelector('.quiz-header-first');
        const quizLogoLeft = document.querySelector('.quiz-logo-left');
        const quizHeaderSecond = document.querySelector('.quiz-header-second');
        const resetPopup = document.querySelector('.reset-popup');
        const confirmResetButton = document.querySelector('.confirm-reset');
        const cancelResetButton = document.querySelector('.cancel-reset');
        let currentSlide = 0;
        let selectedKnowledgeLevel = null;
        let lives = 5;
        let score = 0;
        const avatars = window.quizData ? window.quizData.avatars || [] : [];
        let currentAvatarIndex = 0;
        let explanationShown = false;

        let userResponses = [];
        let quizStatistics = {
            userName: '',
            knowledgeLevel: '',
            avatarId: '',
            avatarName: '',
            avatarImage: '',
            device: '',
            gender: '',
            totalQuestions: 0,
            correctAnswers: 0,
            incorrectAnswers: 0,
            timeSpent: 0,
            detailedResponses: []
        };
        let quizStartTime;

        let selectedDevice = null;
        let selectedGender = null;

        console.log('Quiz initialized'); // Debug log

        // Function: Display Selected Avatar
        function displaySelectedAvatar() {
            const relevantSlides = [5, 6, 7, 8]; // Slides where the avatar should be displayed in the left column
            const currentSlideElement = document.querySelector(`.slide-background[data-slide="${currentSlide}"]`);

            if (!currentSlideElement) {
                console.error(`Slide element not found for slide index: ${currentSlide}`);
                return;
            }

            if (avatars[currentAvatarIndex]) {
                const avatarSrc = avatars[currentAvatarIndex].images[0];

                // Display avatar in left column for relevant slides
                if (relevantSlides.includes(currentSlide)) {
                    const chosenAvatarImageLeft = currentSlideElement.querySelector('.chosen-avatar-image');
                    if (chosenAvatarImageLeft) {
                        chosenAvatarImageLeft.src = avatarSrc;
                        chosenAvatarImageLeft.style.display = 'block';
                    }
                }

                // Display avatar in middle column for all slides (including question slides)
                const chosenAvatarImageMiddle = currentSlideElement.querySelector('.chosen-avatar-image-middle');
                if (chosenAvatarImageMiddle) {
                    chosenAvatarImageMiddle.src = avatarSrc;
                    chosenAvatarImageMiddle.style.display = 'block';
                }

                console.log(`Avatar displayed on slide ${currentSlide}:`, avatarSrc); // Debug log
            } else {
                console.log(`No avatar available for slide ${currentSlide}`); // Debug log
            }
        }

        // Function: Show Slide
        function showSlide(index) {
            console.log('Showing slide:', index); // Debug log

            // Check if the slide index is within bounds
            if (index >= slides.length) {
                console.error(`Slide index out of bounds: ${index}`);
                return;
            }

            slides.forEach((slide, i) => {
                slide.style.transition = 'opacity 0.6s ease-in-out';

                if (i === index) {
                    slide.style.display = 'flex';
                    setTimeout(() => {
                        slide.style.opacity = '1';
                    }, 50);
                } else {
                    slide.style.opacity = '0';
                    setTimeout(() => {
                        slide.style.display = 'none';
                    }, 600);
                }
            });

            updateHeaderVisibility(index);
            updateQuestionCount(index);
            displaySelectedAvatar();
        }

        // Function: Next Slide
        function nextSlide() {
            console.log('Attempting to move to next slide from:', currentSlide); // Debug log

            // Calculate the total number of slides
            const totalSlides = slides.length;

            if (currentSlide < totalSlides - 1) {
                const currentSlideElement = slides[currentSlide];
                const informationalContent = currentSlideElement.querySelector('.informational-content');

                if (informationalContent) {
                    // Skip validation for informational slides
                    currentSlide++;
                    showSlide(currentSlide);
                } else {
                    if (!validateSlide()) {
                        console.log('Validation failed for slide:', currentSlide); // Debug log
                        return;
                    }
                    currentSlide++;
                    showSlide(currentSlide);
                    explanationShown = false;
                    resetExplanationButton();
                }

                // Check if this is the last question and show the certificate button if it is
                if (currentSlide === totalSlides - 2) { // Adjusted to ensure the last question slide is handled correctly
                    const certificateButton = document.querySelector('.certificate-button');
                    if (certificateButton) {
                        certificateButton.style.display = 'block';
                    }
                }
            } else {
                console.log('Quiz completed. Displaying final statistics.'); // Debug log
                if (typeof window.quizStatistics !== 'undefined' && typeof window.quizStatistics.finalizeQuiz === 'function') {
                    window.quizStatistics.finalizeQuiz();
                } else {
                    console.error('quizStatistics.finalizeQuiz function not found');
                }
                completeQuiz();
            }
        }

        // Function to highlight answers after clicking "Weiter"
        function highlightAnswers(currentSlideElement) {
            const allInputs = currentSlideElement.querySelectorAll('.answers-list input[type="radio"]');
            allInputs.forEach(input => {
                const label = input.closest('label');
                const isCorrect = input.getAttribute('data-correct') === 'true';

                if (isCorrect) {
                    label.style.backgroundColor = '#82c800';
                    label.style.color = 'white';
                } else {
                    label.style.backgroundColor = '#CBC8CA';
                    label.style.color = 'black';
                }
            });
        }

        document.querySelectorAll('.answers-list input[type="radio"]').forEach(input => {
            input.addEventListener('change', function() {
                const currentSlideElement = this.closest('.slide-background');
                const weiterButton = currentSlideElement.querySelector('.show-explanation');

                if (weiterButton) {
                    weiterButton.style.display = 'block'; // Show the button when an answer is selected
                }
            });
        });

        // Function to show the "Weiter" button
        function showWeiterButton(input) {
            const currentSlideElement = input.closest('.slide-background');
            const weiterButton = currentSlideElement.querySelector('.show-explanation');

            if (weiterButton) {
                weiterButton.style.display = 'block'; // Show the button when an answer is selected
            }
        }

        // Event listeners for radio inputs in both types of containers
        document.querySelectorAll('.answers-list input[type="radio"], .interactive-image-container input[type="radio"]').forEach(input => {
            input.addEventListener('change', function() {
                showWeiterButton(this);
            });
        });

        // Event Listeners for "Weiter" Button
        document.querySelectorAll('.show-explanation').forEach(button => {
            button.addEventListener('click', function() {
                const currentSlideElement = this.closest('.slide-background');
                const explanationElement = currentSlideElement.querySelector('.explanation');
                const selectedInput = currentSlideElement.querySelector('.answers-list input[type="radio"]:checked, .interactive-image-container input[type="radio"]:checked');

                if (!explanationShown && explanationElement && selectedInput) {
                    // Show explanation on first click
                    highlightAnswers(currentSlideElement);
                    const isCorrect = selectedInput.getAttribute('data-correct') === 'true';
                    const explanation = selectedInput.getAttribute('data-explanation');
                    const answerText = selectedInput.nextSibling ? selectedInput.nextSibling.textContent.trim() : selectedInput.getAttribute('value');
                    const questionText = currentSlideElement.querySelector('.question-text').textContent.trim();

                    displayExplanation(explanationElement, isCorrect, answerText, explanation);
                    explanationShown = true;
					  // Record the user's response
                    if (typeof window.quizStatistics !== 'undefined' && typeof window.quizStatistics.recordUserResponse === 'function') {
                        window.quizStatistics.recordUserResponse(questionText, answerText, isCorrect, explanation);
                    } else {
                        console.error('quizStatistics.recordUserResponse function not found');
                    }
                } else {
                    // Move to the next slide on second click
                    nextSlide();
                }
            });
        });
// Function: Validate Slide
function validateSlide() {
    console.log('Bypassing validation for slide:', currentSlide); // Debug log
    return true; // Always return true to bypass validation
}

// Function: Validate Slide
//function validateSlide() {
//    console.log('Validating slide:', currentSlide); // Debug log
//    console.log('Current selections - Device:', selectedDevice, 'Gender:', selectedGender, 'Knowledge Level:', selectedKnowledgeLevel, 'Name:', quizStatistics.userName); // Debug log
//    const validations = {
//        2: () => selectedDevice !== null,
//        3: () => selectedGender !== null,
//        5: () => quizStatistics.userName.trim() !== '',
//        6: () => selectedKnowledgeLevel !== null // Re-enable this validation
//    };
//
//    const validation = validations[currentSlide];
//    if (validation) {
//        const isValid = validation();
//        if (!isValid) {
//            const messages = {
//                2: 'Bitte wähle ein Gerät aus.',
//                3: 'Bitte wähle ein Geschlecht aus.',
//                5: 'Bitte gib deinen Namen ein.',
//                6: 'Bitte wähle eine Klassenstufe aus.' // Re-enable this message
//            };
//            alert(messages[currentSlide]);
//            return false;
//        }
//    }
//    return true;
//}

        // Function: Previous Slide
        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                showSlide(currentSlide);
            }
        }

        // Function: Update Header Visibility
        function updateHeaderVisibility(index) {
            console.log('Updating header visibility for slide:', index); // Debug log
            const isIntroSlide = index < 7;
            quizHeaderFirst.style.display = isIntroSlide ? 'flex' : 'none';
            quizLogoLeft.style.display = index === 0 ? 'block' : 'none';
            quizHeaderSecond.style.display = isIntroSlide ? 'none' : 'flex';

            if (!isIntroSlide) {
                const livesContainer = quizHeaderSecond.querySelector('.lives-container');
                if (livesContainer) {
                    livesContainer.style.display = (index === 7 || index === 8) ? 'none' : 'flex';
                }
                const quizLogo = quizHeaderSecond.querySelector('.quiz-logo');
                if (quizLogo) {
                    quizLogo.style.margin = '0 auto';
                }
                const resetButton = quizHeaderSecond.querySelector('.reset-button-second-header');
                if (resetButton) {
                    resetButton.style.float = 'right';
                }
            }
        }

        // Function: Update Question Count
        function updateQuestionCount(index) {
            const currentSlide = document.querySelector(`.slide-background[data-slide="${index}"]`);
            if (!currentSlide) {
                console.error(`Slide element not found for slide index: ${index}`);
                return;
            }

            const questionCountElement = currentSlide.querySelector('.question-count');
            if (questionCountElement) {
                const totalQuestions = slides.length - 1; // Assuming the last slide is the final slide
                questionCountElement.textContent = `Frage ${index + 1} von ${totalQuestions}`;
            } else {
                console.warn(`Question count element not found on slide index: ${index}`);
            }
        }

        // Function: Reset Explanation Button
        function resetExplanationButton() {
            const showExplanationButton = document.querySelector(`.slide-background[data-slide="${currentSlide}"] .show-explanation`);
            if (showExplanationButton) {
                showExplanationButton.innerHTML = 'Weiter <img src="https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/arrow-right-navigation.png" alt="Next Icon">';
            }
        }

        // Function: Record User Response
        function recordUserResponse(questionText, answerText, isCorrect, explanation) {
            quizStatistics.detailedResponses.push({
                question: questionText,
                userAnswer: answerText,
                isCorrect: isCorrect,
                explanation: explanation
            });
        }

        // Function: Update Quiz Statistics
        function updateQuizStatistics(isCorrect) {
            quizStatistics.totalQuestions++;
            if (isCorrect) {
                quizStatistics.correctAnswers++;
                score++;
            } else {
                quizStatistics.incorrectAnswers++;
                lives--;
                updateLives();
            }
            quizStatistics.score = score; // Update the score in quizStatistics
            console.log('Updated quiz statistics:', quizStatistics);
        }

        // Function: Display Explanation
        function displayExplanation(explanationElement, isCorrect, answerText, explanation) {
            if (explanationElement) {
                explanationElement.innerHTML = `
                    <div class="${isCorrect ? 'correct-answer' : 'incorrect-answer'}">
                        <h4>${answerText}</h4>
                        ${explanation || '<p>Keine Erklärung verfügbar.</p>'}
                    </div>
                `;
                explanationElement.style.display = 'block';
                explanationElement.classList.add('show');
            }
            updateQuizStatistics(isCorrect); // Update statistics when explanation is shown
        }

        // Function: Complete Quiz
        function completeQuiz() {
            if (typeof window.quizStatistics !== 'undefined' && typeof window.quizStatistics.getStatistics === 'function') {
                const statistics = window.quizStatistics.getStatistics();
                console.log('Final quiz statistics:', statistics);

                const finalSlide = document.querySelector('.slide-background[data-slide="final"]');
                if (!finalSlide) {
                    console.error('Final slide not found');
                    return;
                }

                const usernameElement = finalSlide.querySelector('.final-slide-username');
                const scoreElement = finalSlide.querySelector('.final-slide-score');
                const avatarElement = finalSlide.querySelector('.final-slide-avatar');
                const deviceElement = finalSlide.querySelector('.final-slide-device');
                const genderElement = finalSlide.querySelector('.final-slide-gender');

                if (usernameElement) {
                    usernameElement.textContent = statistics.userName || 'Unbekannter Benutzer';
                    console.log('Username set to:', statistics.userName || 'Unbekannter Benutzer');
                } else {
                    console.error('Username element not found on final slide');
                }

                if (scoreElement) {
                    scoreElement.textContent = `Dein Highscore: ${statistics.percentageScore}% / 100%`;
                    console.log('Score set to:', `${statistics.percentageScore}% / 100%`);
                } else {
                    console.error('Score element not found on final slide');
                }

                if (avatarElement) {
                    avatarElement.src = statistics.avatarImage || '';
                    console.log('Avatar image set to:', statistics.avatarImage || 'No image');
                } else {
                    console.error('Avatar element not found on final slide');
                }

                if (deviceElement) {
                    deviceElement.textContent = statistics.device || 'Unbekannt';
                    console.log('Device set to:', statistics.device || 'Unbekannt');
                } else {
                    console.error('Device element not found on final slide');
                }

                if (genderElement) {
                    genderElement.textContent = statistics.gender || 'Unbekannt';
                    console.log('Gender set to:', statistics.gender || 'Unbekannt');
                } else {
                    console.error('Gender element not found on final slide');
                }

                showSlide('final');
            } else {
                console.error('quizStatistics.getStatistics function not found');
            }
        }

        // Call this function when the last question is answered
        function onLastQuestionAnswered() {
            if (typeof window.quizStatistics !== 'undefined' && typeof window.quizStatistics.finalizeQuiz === 'function') {
                window.quizStatistics.finalizeQuiz();
            } else {
                console.error('quizStatistics.finalizeQuiz function not found');
            }
        }

        // Event listener for the name input
        document.querySelector('.avatar-name-input').addEventListener('input', (event) => {
            quizStatistics.userName = event.target.value.trim();
            console.log('User name entered:', quizStatistics.userName);
        });

        // Function: Send Statistics to Server
        function sendStatisticsToServer(statistics) {
            if (typeof quizData === 'undefined' || !quizData.ajaxurl || !quizData.nonce) {
                console.error('quizData is not properly defined. Make sure it\'s correctly localized.');
                return;
            }

            jQuery.ajax({
                url: quizData.ajaxurl,
                type: 'POST',
                data: {
                    action: 'save_quiz_statistics',
                    nonce: quizData.nonce,
                    statistics: JSON.stringify(statistics)
                },
                success: function(response) {
                    console.log('Statistics sent successfully. Response:', response);
                    if (response.success) {
                        console.log('Statistics saved successfully.');
                    } else {
                        console.error('Error saving statistics:', response.data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending statistics:', error);
                }
            });
        }
// Function: Update Lives Display
        function updateLives() {
            const heartsContainer = document.querySelector('.lives-container');
            if (heartsContainer) {
                const hearts = heartsContainer.querySelectorAll('.heart');
                hearts.forEach((heart, index) => {
                    heart.src = index < lives
                        ? 'https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/hearts.png'
                        : 'https://hpv.4dd-workspace.de/wp-content/uploads/2024/09/heart-dead.png';
                });
            }
        }

        // Weapons selection
        document.addEventListener('DOMContentLoaded', function() {
            const imageWrappers = document.querySelectorAll('.selectable-image-wrapper');

            imageWrappers.forEach(wrapper => {
                wrapper.addEventListener('click', function() {
                    // Remove active class from all wrappers
                    imageWrappers.forEach(w => w.classList.remove('active'));
                    // Add active class to the clicked wrapper
                    this.classList.add('active');
                });
            });
        });

        // Function: Update Avatar Display
        function updateAvatarDisplay() {
            if (avatars.length === 0) return;

            const elements = {
                avatarImage: document.querySelector('.avatar-image'),
                avatarTitle: document.querySelector('.avatar-title'),
                avatarSubtitle: document.querySelector('.avatar-subtitle'),
                avatarIcon: document.querySelector('.avatar-icon'),
                avatarDescription: document.querySelector('.avatar-description'),
                currentSlideNumber: document.getElementById('current-slide-number'),
                totalSlidesNumber: document.getElementById('total-slides-number')
            };

            if (Object.values(elements).some(el => !el)) return;

            const currentAvatar = avatars[currentAvatarIndex];
            if (!currentAvatar) {
                console.error('Current avatar not found');
                return;
            }

            elements.avatarImage.src = currentAvatar.images[0];
            elements.avatarImage.style.display = 'block';
            elements.avatarTitle.textContent = currentAvatar.name;
            elements.avatarSubtitle.textContent = currentAvatar.subtitle;
            elements.avatarIcon.src = currentAvatar.icon;
            elements.avatarIcon.style.display = 'block';
            elements.avatarDescription.textContent = currentAvatar.description;

            elements.currentSlideNumber.textContent = currentAvatarIndex + 1;
            elements.totalSlidesNumber.textContent = avatars.length;

            // Update quiz statistics with avatar information
            quizStatistics.avatarId = currentAvatar.id;
            quizStatistics.avatarName = currentAvatar.name;
            quizStatistics.avatarImage = currentAvatar.images[0];

            console.log('Updated avatar information:', quizStatistics.avatarId, quizStatistics.avatarName, quizStatistics.avatarImage); // Debug log
        }

        // Function: Next Avatar
        function nextAvatar() {
            if (currentAvatarIndex < avatars.length - 1) {
                currentAvatarIndex++;
                updateAvatarDisplay();
            }
        }

        // Function: Previous Avatar
        function prevAvatar() {
            if (currentAvatarIndex > 0) {
                currentAvatarIndex--;
                updateAvatarDisplay();
            }
        }

        // Function: Reset Quiz
        function resetQuiz() {
            currentSlide = 0;
            lives = 5;
            score = 0;
            selectedKnowledgeLevel = null;
            currentAvatarIndex = 0;
            explanationShown = false;
            userResponses = [];
            quizStatistics = {
                userName: '',
                knowledgeLevel: '',
                avatarId: '',
                avatarName: '',
                avatarImage: '',
                device: '',
                gender: '',
                totalQuestions: 0,
                correctAnswers: 0,
                incorrectAnswers: 0,
                timeSpent: 0,
                detailedResponses: []
            };
            selectedDevice = null;
            selectedGender = null;
            quizStartTime = new Date();
            showSlide(currentSlide);
            updateLives();
            updateAvatarDisplay();

            document.querySelectorAll('.device-option, .gender-option, .knowledge-level-option').forEach(option => {
                option.classList.remove('selected');
            });

            // Reset name input
            const nameInput = document.querySelector('.avatar-name-input');
            if (nameInput) {
                nameInput.value = '';
            }
        }

        // Event Listeners
        document.querySelectorAll('.next-slide').forEach(button => {
            button.addEventListener('click', nextSlide);
        });

        document.querySelectorAll('.prev-slide').forEach(button => {
            button.addEventListener('click', prevSlide);
        });

        document.querySelector('.next-avatar').addEventListener('click', nextAvatar);
        document.querySelector('.prev-avatar').addEventListener('click', prevAvatar);

        resetButton.addEventListener('click', () => {
            resetPopup.style.display = 'block';
        });

        confirmResetButton.addEventListener('click', () => {
            resetQuiz();
            resetPopup.style.display = 'none';
        });

        cancelResetButton.addEventListener('click', () => {
            resetPopup.style.display = 'none';
        });

        document.querySelectorAll('.device-option').forEach(button => {
            button.addEventListener('click', () => {
                selectedDevice = button.querySelector('.headline-devices').textContent;
                quizStatistics.device = selectedDevice;
                button.classList.add('selected');
                document.querySelectorAll('.device-option').forEach(otherButton => {
                    if (otherButton !== button) otherButton.classList.remove('selected');
                });
                console.log('Selected device:', selectedDevice); // Debug log
            });
        });

        document.querySelectorAll('.gender-option').forEach(button => {
            button.addEventListener('click', () => {
                selectedGender = button.textContent;
                quizStatistics.gender = selectedGender;
                button.classList.add('selected');
                document.querySelectorAll('.gender-option').forEach(otherButton => {
                    if (otherButton !== button) otherButton.classList.remove('selected');
                });
                console.log('Selected gender:', selectedGender); // Debug log
            });
        });

document.querySelectorAll('.knowledge-level-option').forEach(button => {
    button.addEventListener('click', () => {
        const selectedKnowledgeLevel = parseInt(button.textContent.trim(), 10); // Convert to number
        quizStatistics.knowledgeLevel = selectedKnowledgeLevel;
        button.classList.add('selected');
        document.querySelectorAll('.knowledge-level-option').forEach(otherButton => {
            if (otherButton !== button) otherButton.classList.remove('selected');
        });
        console.log('Selected knowledge level:', selectedKnowledgeLevel); // Debug log

        // Send the selected level to the server using AJAX
        fetch(ajax_object.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'handle_knowledge_level',
                selected_level: selectedKnowledgeLevel,
                security: ajax_object.ajax_nonce
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Server response:', data);
            if (data.exists) {
                console.log('Quizzes are available for this level.');
                // Optionally, trigger a PHP loop or update the UI to reflect the availability
            } else {
                console.warn('No quizzes found for this level.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

        // Initialize quiz
        function initQuiz() {
            if (typeof window.quizStatistics !== 'undefined' && typeof window.quizStatistics.startQuiz === 'function') {
                window.quizStatistics.startQuiz();
            } else {
                console.error('quizStatistics.startQuiz function not found');
            }
            resetQuiz();
            updateAvatarDisplay();
            displaySelectedAvatar();
        }

        // Initialize quiz on page load
        initQuiz();

        // Certificate functionality
        window.generateAndDownloadCertificate = function() {
            console.log('generateAndDownloadCertificate function called');
            const certificateContainer = document.querySelector('.certificate-container');
            const certificateBackground = document.querySelector('.certificate-background');
            const certificateUsername = document.querySelector('.certificate-username');
            const certificateRobot = document.querySelector('.certificate-robot');
            const certificateScore = document.querySelector('.certificate-score');

            console.log('Certificate elements:', {
                container: certificateContainer,
                background: certificateBackground,
                username: certificateUsername,
                robot: certificateRobot,
                score: certificateScore
            });

            if (!certificateContainer || !certificateBackground || !certificateUsername || !certificateRobot || !certificateScore) {
                console.error('One or more certificate elements not found');
                alert('Error: Certificate elements not found. Please try again.');
                return;
            }

            const quizData = window.quizStatistics ? window.quizStatistics.getStatistics() : null;
            console.log('Quiz data:', quizData);

            if (!quizData) {
                console.warn('Quiz data not available.');
                alert('Quiz data not available. Please complete the quiz first.');
                return;
            }

            // Update certificate content with quiz data
            certificateUsername.textContent = quizData.userName || 'Unbekannter Benutzer';
            certificateRobot.src = quizData.avatarImage || '';
            certificateRobot.alt = 'Selected Robot';
            certificateScore.textContent = `${quizData.percentageScore || 0}% / 100%`;

            console.log('Certificate populated with:', {
                username: certificateUsername.textContent,
                robotSrc: certificateRobot.src,
                score: certificateScore.textContent
            });

            // Temporarily show the certificate container
            certificateContainer.style.display = 'block';
            certificateBackground.style.display = 'flex';

            // Ensure all images are loaded, including the background image
            const backgroundImage = new Image();
            backgroundImage.src = certificateBackground.style.backgroundImage.replace(/url$$['"]?(.+?)['"]?$$/i, '$1');
			            Promise.all([
                ...Array.from(certificateBackground.querySelectorAll('img')).map(img => {
                    if (img.complete) return Promise.resolve();
                    return new Promise(resolve => { img.onload = img.onerror = resolve; });
                }),
                new Promise(resolve => { backgroundImage.onload = backgroundImage.onerror = resolve; })
            ]).then(() => {
                html2canvas(certificateBackground, {
                    scale: 2,
                    logging: true,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: null
                }).then(canvas => {
                    console.log('Certificate image generated successfully');
                    
                    const link = document.createElement('a');
                    link.download = 'HPV-Fighter-Zertifikat.jpg';
                    link.href = canvas.toDataURL('image/jpeg', 0.95);
                    
                    console.log('Download link created. Initiating download...');
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    
                    console.log('Download initiated.');
                }).catch(error => {
                    console.error('Error generating certificate image:', error);
                    alert('Error generating certificate image. Please check the console for more information.');
                }).finally(() => {
                    // Hide the certificate container again
                    certificateContainer.style.display = 'none';
                    certificateBackground.style.display = 'none';
                });
            });
        }

        document.fonts.ready.then(() => {
            console.log('Fonts loaded:', Array.from(document.fonts).map(font => font.family));
        });

        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM content loaded. Initializing certificate functionality.');

            const downloadButton = document.querySelector('.download-certificate');

            console.log('Download button:', downloadButton);

            if (downloadButton) {
                console.log('Adding click event listener to download button');
                downloadButton.addEventListener('click', window.generateAndDownloadCertificate);
            } else {
                console.error('Download button not found');
            }
        });

        // End document
    });
</script>