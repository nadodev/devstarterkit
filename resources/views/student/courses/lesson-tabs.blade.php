<!-- Sistema de Tabs -->
<div class="mt-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <!-- Título das Abas -->
        <div class="px-6 pt-6 pb-2">
            <h2 class="text-xl font-bold text-gray-900">
                <i class="fas fa-layer-group mr-2"></i>Informações da Aula
            </h2>
            <p class="text-sm text-gray-600 mt-1">
                Explore detalhes, faça perguntas e avalie esta aula
            </p>
        </div>
        
        <!-- Navegação das Tabs -->
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8 px-6" aria-label="Tabs">
                <button 
                    onclick="switchTab('overview')" 
                    id="tab-overview" 
                    class="tab-button active py-4 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600"
                >
                    <i class="fas fa-info-circle mr-2"></i>Visão Geral
                </button>
                <button 
                    onclick="switchTab('qa')" 
                    id="tab-qa" 
                    class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                >
                    <i class="fas fa-comments mr-2"></i>Perguntas e Respostas
                </button>
                <button 
                    onclick="switchTab('reviews')" 
                    id="tab-reviews" 
                    class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                >
                    <i class="fas fa-star mr-2"></i>Avaliações
                </button>
            </nav>
        </div>

        <!-- Conteúdo das Tabs -->
        <div class="p-6">
            <!-- Tab Visão Geral -->
            <div id="content-overview" class="tab-content">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Sobre esta Aula</h3>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed">{{ $lesson->description }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-blue-600"></i>Informações da Aula
                            </h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Duração:</span>
                                    <span class="font-medium">{{ $lesson->duration_minutes ?? 'N/A' }} minutos</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tipo:</span>
                                    <span class="font-medium">{{ ucfirst($lesson->type) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ordem:</span>
                                    <span class="font-medium">{{ $lesson->order }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-graduation-cap mr-2 text-green-600"></i>Progresso
                            </h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium {{ $progress && $progress->is_completed ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ $progress && $progress->is_completed ? 'Concluída' : 'Em andamento' }}
                                    </span>
                                </div>
                                @if($progress && $progress->completed_at)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Concluída em:</span>
                                        <span class="font-medium">{{ $progress->completed_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($lesson->quizzes && $lesson->quizzes->count() > 0)
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-question-circle mr-2 text-blue-600"></i>Quiz da Aula
                            </h4>
                            <div class="space-y-2 text-sm">
                                @foreach($lesson->quizzes as $quiz)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-700">{{ $quiz->title }}</span>
                                        <span class="text-gray-600">{{ count($quiz->questions) }} questões</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Perguntas e Respostas -->
            <div id="content-qa" class="tab-content hidden">
                <div class="space-y-6">
                    <!-- Formulário de Nova Pergunta -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-plus-circle mr-2 text-green-600"></i>Fazer uma Pergunta
                        </h4>
                        <form id="commentForm">
                            @csrf
                            <div class="mb-4">
                                <textarea 
                                    id="commentContent" 
                                    name="content" 
                                    rows="3" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                    placeholder="Faça sua pergunta sobre esta aula..."
                                    maxlength="1000"
                                ></textarea>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-xs text-gray-500">Máximo 1000 caracteres</span>
                                    <span id="charCount" class="text-xs text-gray-500">0/1000</span>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button 
                                    type="submit" 
                                    id="submitCommentBtn"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    <i class="fas fa-paper-plane mr-2"></i>Enviar Pergunta
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Lista de Perguntas e Respostas -->
                    <div id="commentsContainer">
                        <div id="commentsLoading" class="text-center py-8">
                            <i class="fas fa-spinner fa-spin text-gray-400 text-2xl mb-2"></i>
                            <p class="text-gray-500">Carregando perguntas...</p>
                        </div>
                        <div id="commentsList" class="space-y-4 hidden">
                            <!-- Comentários serão carregados aqui via JavaScript -->
                        </div>
                        <div id="noComments" class="text-center py-8 hidden">
                            <i class="fas fa-question-circle text-gray-300 text-3xl mb-3"></i>
                            <p class="text-gray-500">Nenhuma pergunta ainda. Seja o primeiro a perguntar!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Avaliações -->
            <div id="content-reviews" class="tab-content hidden">
                <div class="space-y-6">
                    <!-- Formulário de Avaliação -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-star mr-2 text-yellow-600"></i>Avaliar esta Aula
                        </h4>
                        <form id="reviewForm">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sua Avaliação</label>
                                <div class="flex items-center space-x-1 mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" onclick="setRating({{ $i }})" class="star-rating text-2xl text-gray-300 hover:text-yellow-400 transition" data-rating="{{ $i }}">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    @endfor
                                </div>
                                <input type="hidden" id="rating" name="rating" value="0">
                            </div>
                            <div class="mb-4">
                                <label for="reviewComment" class="block text-sm font-medium text-gray-700 mb-2">
                                    Comentário (opcional)
                                </label>
                                <textarea 
                                    id="reviewComment" 
                                    name="comment" 
                                    rows="3" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                    placeholder="Compartilhe sua opinião sobre esta aula..."
                                    maxlength="500"
                                ></textarea>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-xs text-gray-500">Máximo 500 caracteres</span>
                                    <span id="reviewCharCount" class="text-xs text-gray-500">0/500</span>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button 
                                    type="submit" 
                                    id="submitReviewBtn"
                                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg font-medium transition disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    <i class="fas fa-star mr-2"></i>Enviar Avaliação
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Lista de Avaliações -->
                    <div id="reviewsContainer">
                        <div id="reviewsLoading" class="text-center py-8">
                            <i class="fas fa-spinner fa-spin text-gray-400 text-2xl mb-2"></i>
                            <p class="text-gray-500">Carregando avaliações...</p>
                        </div>
                        <div id="reviewsList" class="space-y-4 hidden">
                            <!-- Avaliações serão carregadas aqui via JavaScript -->
                        </div>
                        <div id="noReviews" class="text-center py-8 hidden">
                            <i class="fas fa-star text-gray-300 text-3xl mb-3"></i>
                            <p class="text-gray-500">Nenhuma avaliação ainda. Seja o primeiro a avaliar!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
