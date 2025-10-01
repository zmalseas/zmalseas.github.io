<?php
// Inline JavaScript - Floating Labels
// Replaces js/floating-labels.js (30 lines)
?>
<script>
// Floating Labels Handler
// Simple and reliable logic for floating label animations
document.addEventListener('DOMContentLoaded', function() {
  // Find all floating label inputs and textareas
  const floatingFields = document.querySelectorAll('.floating-label input, .floating-label textarea');
  
  if (floatingFields.length === 0) return; // No floating labels on this page
  
  floatingFields.forEach(function(field) {
    
    function updateLabelState() {
      // Check if field has content
      const hasContent = field.value.trim().length > 0;
      
      if (hasContent) {
        field.classList.add('has-content');
      } else {
        field.classList.remove('has-content');
      }
    }
    
    // Update on input and focus/blur events
    field.addEventListener('input', updateLabelState);
    field.addEventListener('focus', updateLabelState);
    field.addEventListener('blur', updateLabelState);
    
    // Initialize state on page load
    updateLabelState();
  });
});
</script>