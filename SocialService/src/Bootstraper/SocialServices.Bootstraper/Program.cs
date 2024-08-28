using MyKeyBox.Modules.BackOffice.Api;
using MyKeyBox.Shared.Infrastructure;

var builder = WebApplication.CreateBuilder(args);
{
    builder.Services.AddControllers();
    builder.Services.AddSwaggerGen();
    builder.Services.AddInfrastructure();
    builder.Services.AddBackOfficeModule();
}
var app = builder.Build();
{
    if (builder.Environment.IsDevelopment())
    {
        app.UseSwagger();
        app.UseSwaggerUI();
        app.UseDeveloperExceptionPage();
    }

    app.UseInfrastructure();
    app.UseRouting();
    app.MapControllers();
    app.Run();
}


