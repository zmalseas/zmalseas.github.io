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
    
    // Event listeners
    field.addEventListener('input', updateLabelState);
    field.addEventListener('blur', updateLabelState);
    field.addEventListener('change', updateLabelState);
    
    // Check initial state
    updateLabelState();
  });
});
