(function() {

	tinymce.PluginManager.add('kapsule_scooter_form_toolbar', function( editor, url ) {

		editor.addButton('kapsule_scooter_form_bouton', {
			icon: false,
			image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAD2QAAA9kBvACB0QAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAStSURBVHic7dtriFVVFAfw353UasTSMjRCNIsKyx5akX0QEUoo0qAwoTAosA9RRgQZQYRBEApBFESUH8KiEIOiKIyyJxYKPe2DFUpFGD20FHNy8vThnKszd/a+c+7znJzZsOAyd++1////2Xfvtc7aU0mSxEhuPUUDKLqNClA0gKLbqABFAyi6jQpQNICi24gXYEz1Q6VSuQQrcBF6C0PU2XYQm7ExSZJtIIsET8YuJCPA9mF+kiQp9yMfmI4dJQDYSduDK6qcBwmQiTAFn5cAaCfsN8wZyHeIAJkIE/FxCQC303bjggDXyTAz8EUv3ioB8HbYTzgnwHEatsLPEXXGYUMJCLRiO3FmgNtM6aa/V9bxDzWbQ9bxODxbAiLN2A5MC3A6N1sVyUABEuzHVbUDskFrS0CoEfsaUwM8ZuOXAf0GCZCgDzdERHiwBMTy2GeYHMA/V3oSDOw7RIAE/bg9IsKdOFwCkjH7FBMDuOdlZGv7BwWo2n0REW7GoRKQrbUPMCGAd4E0+guNqStAgkcjIlyHv0tAumpvozeAcxEO1Bk3rAAJnkZPRNm/SkD+dZwQwLdYmvzUG5tLgAQvYWxgkksN3Vi6aRsjuJbinxzjcwuQ4E3hZTbL0XO1m/YCxgTwLJdu5Hl8NCRAgo+Ed9kZ+K6L5J8T/lmu0Ngp1bAAiTRbnBKYfCq+7AL5J1EJzL+yCV9NCZDgW8wIgJiELR0kvyZyKq1q0l/TAiTS3/2sAJjx2NQB8qsj5Fe34LMlARLpCXBZJJPc2EbyqyLk17Tot2UBEmmUtTCSSa5rg/+VAd8V6V7Qqu+2CJBIA47rI0Afb9LnYdwR8NmjfSl62wRIpGfvNZGl+lATvpZHfC3Ev23CvKedAryD8SHQGfC75DujD2FpzE/ma5l8kV7XVsAbAvF4JEqrl0n2YfFwfjJf16qf6HRNgFcwLgDwYuFobYlwknIAiwL9j5e+jAklPPPxZ5ECvCgcjy/JnuaGiDgLDc7R92FBoF+vozHFe8L5/hz8WoQA6yJPeKnBy3yTwN6Ay/F7BmJe4PsJeL9mzm3Cr7vOw4/dFOAp4Xg8loltwaRA//MxN/D3ifgkMvc3OCMwZrrGS3tNCbA2sikNl4l9hdNzbG6TpS8262HYhbMDYxst7TUswCMR0HfnHP+9QCVqgJ/TsT2nr924MLJ68pb2GhLggQjo+xsUMVaJmqbxJbxHeP/IW9rLLcA9EfIPNwi4aoMqUThL8/cT9uPqALY8pb1hBQjG49kEjzUJuGr9eBXrtf6GuQ83BjAOV9qrK0A/bg04reCJFgF3wvpxW+RhxUp7UQEO4aaAox48UwKy9ezeiAih0l5QgD4siSyn50tAMI/FTqva0t4QAWLx+Fi8XAJijVjs5ektjkaqgwSIxePjpJtV0YSasfXCuUq1tHdEgL24MtDxRP//qzKvCWeSC/AD6fkbisfH490SEGiHbRbOJGcTiM9xkmPvpthWnDqEa4D8KVnnogF3wrarySRryZ/m2L0oWbWdBmSSRy5LZ22Z9Cj8wrHZDuJD6d1oZOfkSG4j/v8FRgUoGkDRbVSAogEU3UYFKBpA0W3EC/AfKRig5Ggc6fwAAAAASUVORK5CYII=',
			tooltip: 'Scooter Contact Form',
			onclick: function() {
						editor.insertContent('[scootercontact]');
			}
		});
	});

})();